<?php get_header(); $options = get_option('neutral_options'); ?>
  <div id="contents" class="clearfix">

   <div id="left_col">
<?php if ( is_home() ) { query_posts("cat=-3"); } ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="post">
     <h2 class="post_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
     <ul class="post_info">
      <li><?php the_time(__('F jS, Y', 'neutral')) ?></li>
      <?php if ($options['author']) : ?><li><?php _e('By ','neutral'); ?><?php the_author_posts_link(); ?></li><?php endif; ?>
      <?php edit_post_link(__('[ EDIT ]', 'neutral'), '<li class="post_edit">', '</li>' ); ?>
     </ul>
     <div class="post_content">
      <?php the_content(__('[Read More]', 'neutral')); ?>
      <?php wp_link_pages(); ?>
     </div>
    </div>
    <div class="post_meta">
     <ul class="clearfix">
      <?php if($options['post_meta_type'] == 'category') { ?>
      <li class="post_category"><?php the_category(' . '); ?></li>
      <?php } else { ?>
      <?php the_tags('<li class="post_tag">', ' . ', '</li>'); ?>
      <?php } ?>
      <li class="post_comment"><?php comments_popup_link(__('Write comment', 'neutral'), __('1 comment', 'neutral'), __('% comments', 'neutral')); ?></li>
     </ul>
    </div>

<?php endwhile; else: ?>
    <div class="post">
     <h2 class="post_title"><?php _e("Sorry, but you are looking for something that isn't here.","neutral"); ?></h2>
    </div>
<?php endif; ?>

    <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { include('navigation.php'); } ?>

   </div><!-- END #left_col -->

   <?php get_sidebar(); ?>

  </div><!-- END #contents -->
<?php get_footer(); ?>