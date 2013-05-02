<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>


<div id="content">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


      <div class="left">
	<div id="entry_box">
	<div id="entry_title"><h2><?php the_title(); ?> </h2></div><!--entry_title-->
	<div id="entry_info">TIME：<?php the_time('Y年m月d日') ?> AUTHOR：<?php the_author() ?> CATEGORY：<?php the_category(', ') ?> 流行热度：<?php if(function_exists('the_views')) { the_views(); print '℃';  } ?> </div><!--entry_info-->

<div id="hrline"></div>
	
	<div id="entry">  <?php the_content('Read more...'); ?>
	 <?php wp_link_pages( array( 'before' => '<p class="pages">' . __( '日志分页:'), 'after' => '</p>' ) ); ?>		

</div><!--enrty-->

 
   	<?php endwhile; else: ?>
	<?php endif; ?>

 <div id="hrline"></div> 
 
    <div id="entry_ping">
	<?php comments_template(); ?>	
		<div class="clear"></div>
    </div><!--entry_ping"-->


	 </div><!--enrty_box--> 
	  </div><!--left-->



		<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>



</div><!--content--></div>

      
<?php get_footer(); ?>