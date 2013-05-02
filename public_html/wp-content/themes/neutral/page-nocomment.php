<?php
/*
Template Name:No comment
*/
?>
<?php get_header(); ?>
  <div id="contents" class="clearfix">

   <div id="left_col">
<?php $options = get_option('neutral_options'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="post">
     <h1 class="post_title"><?php the_title(); ?></h1>
     <ul class="post_info">
      <li><?php the_time(__('F jS, Y', 'neutral')) ?></li>
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

   </div><!-- END #left_col -->

   <?php get_sidebar(); ?>

  </div><!-- END #contents -->
<?php get_footer(); ?>