<div id="right_col">

 <?php $options = get_option('neutral_options'); ?>
 <?php if ($options['show_information']) : ?>
 <div class="side_box">
  <h3 class="side_title"><?php echo ($options['information_title']); ?></h3>
  <?php echo ($options['information_contents']); ?>
 </div>
 <?php endif; ?>

 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('top') ) : ?>
 <div id="side_top">
  <div class="side_box">
   <h3 class="side_title"><?php _e('RECENT ENTRY','neutral'); ?></h3>
   <ul>
    <?php $myposts = get_posts('numberposts=5'); foreach($myposts as $post) : ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endforeach; ?>
   </ul>
  </div>
 </div>
 <div id="side_middle_ex" class="clearfix">
  <div id="side_left_ex">
   <div class="side_box_short">
    <h3 class="side_title"><?php _e('CATEGORY','neutral'); ?></h3>
    <ul>
     <?php wp_list_cats('sort_column=name'); ?>
    </ul>
   </div>
  </div>
  <div id="side_right_ex">
   <div class="side_box_short">
    <h3 class="side_title"><?php _e('ARCHIVES','neutral'); ?></h3>
    <ul>
     <?php wp_get_archives('type=monthly'); ?>
    </ul>
   </div>
  </div>
 </div><!-- END #side_middle_ex -->
 <div id="side_bottom_ex">
  <div class="side_box">
   <h3 class="side_title"><?php _e('LINKS','neutral'); ?></h3>
   <ul>
    <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
   </ul>
  </div>
 </div>
 <?php endif; ?>

 <div id="side_middle" class="clearfix">
  <div id="side_left">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left') ) : ?>
  <?php endif; ?>
  </div>

  <div id="side_right">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right') ) : ?>
  <?php endif; ?>
  </div>
 </div><!-- END #side_middle -->

 <div id="side_bottom">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom') ) : ?>
 <?php endif; ?>
 </div>

</div><!-- END #right_col -->