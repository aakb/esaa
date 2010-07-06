<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $head_title; ?></title>
		<?php echo $head; ?>
    	<?php echo $styles; ?>
    	<?php echo phptemplate_css(); ?>
    	<?php echo $scripts; ?>
	    <!--[if IE 7]>
	      <?php echo '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />'; ?>
	    <![endif]-->
	</head>

	<body id="frontpage">
	<div id="wrapper">
		<div id="header">
			<div id="link-outer-container">
	    		<a href="http://www.aarhuskommune.dk" title="Århus Kommune"></a>
	  		</div>
			<?php 
            	if ($logo || $site_title) {
	                print '<a href="'. check_url($base_path) .'" title="'. $site_title .'">';
      	        	print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" />';
	                print $site_html .'</a>';
            	}
            ?>
            <?php echo $header; ?>

			<div id="top-menu"><?php echo $top; ?></div>
		</div>
		<div id="navigation">
			<?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
		</div>
		<div id="top_gpx">
			<div id="front_top_gpx_overlay"></div>
			<div id="front_top_gpx_image"><?php echo $front_top_gpx_image; ?></div>
		</div>
		<div id="content-grunge"></div>
		<div id="content-wrapper">
			<div id="content-wrapper-inside">
			<div id="sidebar-left">
			<?php echo $left; ?></div>
			<div id="main-content">
				<?php if ($mission): echo '<div id="mission">'. $mission .'</div>'; endif; ?>
         		<?php if ($title): echo '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          		<?php if ($tabs): echo '<ul class="tabs primary">'. $tabs .'</ul>'; endif; ?>
          		<?php if ($tabs2): echo '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          		<?php if ($show_messages && $messages): echo $messages; endif; ?>
          		<?php echo $help; ?>
				<?php echo $content; ?>
			</div>
			<div id="sidebar-right"><?php echo $right; ?></div>

			
			</div>
		</div>
		<div id="bottom-corners"></div>
		<div id="footer"><div id="footer-inside"><?php print $footer_message . $footer ?></div></div>
	</div>
	
	</body>
	<?php print $closure; ?>
</html>