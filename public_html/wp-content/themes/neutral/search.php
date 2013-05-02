<?php get_header(); $options = get_option('neutral_options'); ?>
  <div id="contents" class="clearfix">

   <div id="left_col">
<?php if (have_posts()) : ?>

    <div id="search_result">
     <p><?php _e('Search results for ', 'neutral'); echo '[ <span id="keyword">' .$s. "</span> ]"; ?> - <?php $my_query =& new WP_Query("s=$s & showposts=-1"); echo $my_query->post_count; _e(' hit', 'neutral'); ?></p>	
    </div>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="search_result_content">
     <h2 class="post_title"><?php the_title(); ?></h2>
     <ul class="post_info">
      <li><?php the_time(__('F jS, Y', 'neutral')) ?></li>
      <?php if ($options['author']) : ?><li><?php _e('By ','neutral'); ?><?php the_author_posts_link(); ?></li><?php endif; ?>
      <?php edit_post_link(__('[ EDIT ]', 'neutral'), '<li class="post_edit">', '</li>' ); ?>
     </ul>
     <p><a href="<?php the_permalink() ?>"><?php the_excerpt_rss(); ?><span class="read_more"><?php _e('[ READ MORE ]', 'neutral'); ?></span></a></p>
    </div>

<?php endwhile; else: ?>
    <div class="post">
     <h2 class="post_title"><?php _e("Sorry, but you are looking for something that isn't here.","neutral"); ?></h2>
    </div>
<?php endif; ?>

    <div id="search_pagenavi">
     <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { include('navigation.php'); } ?>
    </div>

   </div><!-- END #left_col -->

   <?php get_sidebar(); ?>

  </div><!-- END #contents -->
<?php get_footer(); ?>