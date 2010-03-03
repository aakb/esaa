<?php


function phptemplate_css() {
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user_agent = explode(' ', $user_agent);
$size = count($user_agent)-1	;
$os = str_replace('(','',$user_agent[1]);
$os = str_replace(';','',$os);
$browser = explode('/',$user_agent[$size]);
$browser = $browser[0];

	if($os == 'Windows' && $browser == 'Firefox') {
	    echo  '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-windows-ff.css" />';
	}

}

function esaa_links($links, $attributes = array('class' => 'links')) {
 
  $output = '';

  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
	  
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))) {
        $class .= ' active';
      }
	  
	  $class .= ' menu-'. strtolower($link['title']);
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'><span>';
      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</span></li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}


/**
 * Generate the content group title eg. (Forum, Articles)
 * based on breadcrumb, node title or sitename.
 * 
 * @access public
 * @param mixed &$node
 * @return void
 */
function first_title(&$node) {
	
    $text = $text." "; 
    $title = drupal_get_title();
	$breadcrumb = drupal_get_breadcrumb();

	if($breadcrumb[1]) {
		$text = strip_tags($breadcrumb[1]) ;		
	} elseif(! $breadcrumb[1] && $title) {
		$text =  $title ;		
	} else {
		$text =	variable_get('site_name',0) ;		
	}

	//return strip_tags($text);
}

function esaa_secondary() {
	$menu_name = variable_get('menu_secondary_links_source', 'secondary-links');
	$menu_array = menu_tree_page_data($menu_name);
	$output = '';
	// if the $menu_array has an entry with a below element in the top
	// level, then that is our menu ... we want to extract that element
	// and then output it using the menu_tree_output function ...
	$top_level_keys = array_keys($menu_array);
	foreach ($top_level_keys as $current_key) {
	   	  
	    $sub_menu_array = $menu_array[$current_key];
	    if ($sub_menu_array['below']) {
	    	$output .= '<h2>'. $menu_array[$current_key]['link']['title'] .'</h2>';
	        $output .= menu_tree_output($sub_menu_array['below']);    
	    }
	}
	return $output;
}

function phptemplate_preprocess_page(&$vars) {
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));

   // if ($alias == $_GET['q']) {
      $suggestions = array();
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
        $suggestions[] = $template_filename;
      }
  // }
    
    
    if (drupal_is_front_page()) {
      $suggestions[] = 'page-front';
    }
    $vars['template_files'] = $suggestions;
  }
} 
