<?php
/**
  Template Name:友情链接
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>


<div id="content">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="left">

<div id="links">
   <h2>LINKS</h2>

  <ul class="links_left">
	<?php
  
        $bookmarks = get_bookmarks('title_li=&orderby=rand'); //全部链接随机输出
        //如果你要输出某个链接分类的链接，更改一下get_bookmarks参数即可
        //如要输出链接分类ID为5的链接 title_li=&categorize=0&category=5&orderby=rand
        if ( !empty($bookmarks) ) {
            foreach ($bookmarks as $bookmark) {
            echo '<li><a href="' , $bookmark->link_url , '" title="' , $bookmark->link_description , '" target="_blank" >' , $bookmark->link_name , '</a></li>';
            }
        }
        ?> </ul>

 <ul class="links_right">

<?php the_content('Read more...'); ?>
	 <?php wp_link_pages( array( 'before' => '<p class="pages">' . __( '日志分页:'), 'after' => '</p>' ) ); ?>		


 </ul>

<div class="clear"></div>

</div>
   	<?php endwhile; else: ?>
	<?php endif; ?>
<div id="hrline"></div>

    <div id="entry_ping">
	<?php comments_template(); ?>	
		<div class="clear"></div>
    </div><!--entry_ping"-->


	  </div><!--left-->



		<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>



</div><!--content--></div><!--cbox-->

      
<?php get_footer(); ?>