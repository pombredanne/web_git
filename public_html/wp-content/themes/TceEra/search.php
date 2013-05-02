<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>







<div id="content">


     <div class="left">

	   <ul class="c_list">
 <?php
 //Code automatically inserted by Featurific for Wordpress plugin
 if(is_home())                             //If we're generating the home page (remove this line to make Featurific appear on all pages)...
  if(function_exists('insert_featurific')) //If the Featurific plugin is activated...
   insert_featurific();                    //Insert the HTML code to embed Featurific
?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	   <li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	    
		<h2><a  href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>" target="_blank" ><?php echo mb_strimwidth(get_the_title(), 0, 38,"…") ?></a></h2>
	    
	    <div class="imgg">   <span><?php
							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						?>
							<a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title(); ?>" ><?php the_post_thumbnail( 'thumbnail', array('class' => 'post-thumbnail')); ?></a>
                        <?php } else {?>
                        	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank">
								<img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="post-thumbnail" />

                            </a>
                        <?php } ?></span> </div>

 <div class="date"><?php the_author() ?> 发布于 <?php the_time('Y年m月d日') ?> 热度<?php if(function_exists('the_views')) { the_views(); print '℃';  } ?>  <a href="" title="" alt="" target="blank" ><?php comments_popup_link('暂无评论', '评论数 1', '评论数 %'); ?></a><br/>类别：<?php the_category(', ') ?>   标签：<?php the_tags('', ', ', ''); ?></div>

	   <div class="m_text"> <?php if (has_excerpt())
						{ ?> 
							<?php the_excerpt() ?>
						<?php
						}
						else{
							echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"...");
						} 
						?></div>

	   
	   </li>

	<?php endwhile; ?> </ul>		<?php else : ?>
  <div id="search_none">
            	<h2>OH~OH~OH!抱歉,没有找到合适的文章.</h2>
                
  <div class="search_none_o">点击这里<a href="<?php echo get_settings('home'); ?>">返回首页</a>  或在搜索中继续输入关键字查找您所需的信息.</div>
            </div>
		<?php endif; ?>

	  <div id="pagelist">

 <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
	  	  	  
	  </div>
	  </div><!--main_left-->

<?php get_sidebar(); ?>





</div><!--content--></div><!--cbox-->
      
<?php get_footer(); ?>