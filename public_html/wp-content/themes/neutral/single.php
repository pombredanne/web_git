<?php get_header(); ?>
  <div id="contents" class="clearfix">

   <div id="left_col">
<?php $options = get_option('neutral_options'); ?>

<?php if ($options['bread_crumb']) : ?>
    <div id="bread_crumb">
     <ul class="clearfix">
      <li id="bc_home"><a href="<?php echo get_settings('home'); ?>/"><?php _e('HOME','monochrome'); ?></a></li>
      <li id="bc_cat"><?php the_category(' . '); ?></li>
      <li><?php the_title(); ?></li>
     </ul>
    </div>
<?php endif; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="post">
     <h1 class="post_title"><?php the_title(); ?></h1>
     <ul class="post_info">
      <li><?php the_time(__('F jS, Y', 'neutral')) ?></li>
      <li><?php _e('Posted in ','neutral'); ?><?php the_category(' . '); ?></li>
      <?php if ($options['author']) : ?><li><?php _e('By ','neutral'); ?><?php the_author_posts_link(); ?></li><?php endif; ?>
      <li class="write_comment"><a href="<?php the_permalink() ?>#comments"><?php _e('Write comment','neutral'); ?></a></li>
      <?php edit_post_link(__('[ EDIT ]', 'neutral'), '<li class="post_edit">', '</li>' ); ?>
     </ul>
     <div class="post_content">
      <?php the_content(__('Read more', 'neutral')); ?>
      <?php wp_link_pages(); ?>
     </div>
    </div>

<?php endwhile; else: ?>
    <div class="post">
     <p><?php _e("Sorry, but you are looking for something that isn't here.","neutral"); ?></p>
    </div>
<?php endif; ?>

    <div id="comments_wrapper">
     <?php if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); } ?>
    </div>

   <?php if ($options['next_preview_post']) : ?>
   <div id="previous_next_post" class="clearfix">
    <p id="previous_post"><?php previous_post_link('%link') ?></p>
    <p id="next_post"><?php next_post_link('%link') ?></p>
   </div>
   <?php endif; ?>

   </div><!-- END #left_col -->

   <?php get_sidebar(); ?>

  </div><!-- END #contents -->
<?php get_footer(); ?>