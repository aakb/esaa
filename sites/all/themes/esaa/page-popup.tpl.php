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

	<body class="popup">

		

				<?php if ($mission): echo '<div id="mission">'. $mission .'</div>'; endif; ?>
         		<?php if ($title): echo '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          		<?php if ($tabs): echo '<ul class="tabs primary">'. $tabs .'</ul>'; endif; ?>
          		<?php if ($tabs2): echo '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          		<?php if ($show_messages && $messages): echo $messages; endif; ?>
          		<?php echo $help; ?>
				<?php echo $content_top; ?>
				<?php echo $content; ?>

	
	</body>
	<?php print $closure; ?>
</html>