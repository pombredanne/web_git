<?php
/*
Template Name:No info
*/
?>
<?php get_header(); ?>
  <div id="contents" class="clearfix">

   <div id="left_col">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="post">
     <h1 class="post_title"><?php the_title(); ?></h1>
     <?php edit_post_link(__('[ EDIT ]', 'neutral'), '<p id="page_edit">', '</p>' ); ?>
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

   </div><!-- END #left_col -->

   <?php get_sidebar(); ?>

  </div><!-- END #contents -->
<?php get_footer(); ?>