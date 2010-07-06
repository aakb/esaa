<?php
// $Id: date-navigation.tpl.php,v 1.1.4.10 2009/04/30 10:44:43 karens Exp $
/**
 * @file
 * Template to display date navigation links.
 *
 * $nav_title
 *   The formatted title for this view. In the case of block
 *   views, it will be a link to the full view, otherwise it will 
 *   be the formatted name of the year, month, day, or week.
 * 
 * $prev_url
 * $next_url
 *   Urls for the previous and next calendar pages. The links are 
 *   composed in the template to make it easier to change the text,
 *   add images, etc.
 * 
 * $prev_options
 * $next_options
 *   Query strings and other options for the links that need to
 *   be used in the l() function, including rel=nofollow.
 * 
 * $block: 
 *   Whether or not this view is in a block.
 * 
 * $view
 *   The view object for this navigation.
 * 
 * The &nbsp; in the prev and next divs is to be sure they are never
 * completely empty, needed in some browsers to prop the header open
 * so the title stays centered.
 * 
 */
?>
<?php
 $prev_options['html'] = true;
 $next_options['html'] = true;
?>

<div class="date-nav clear-block">
    <?php if (!empty($prev_url)) : ?>
      <span class="next"> <?php print l(theme('image','sites/all/themes/esaa/images/link-mark-left.png',t('Previous')), $prev_url, $prev_options); ?></span>
    <?php endif; ?>
  &nbsp;
   <span class="date-heading"><?php print $nav_title ?></span>
  &nbsp;
    <?php if (!empty($next_url)) : ?>
      <!--<span class="next"> <?php print l(' »', $next_url, $next_options); ?></span>-->
      <span class="next"> <?php print l(theme('image','sites/all/themes/esaa/images/link-mark.png',t('Next')), $next_url, $next_options); ?></span>
    <?php endif; ?>  
</div>
