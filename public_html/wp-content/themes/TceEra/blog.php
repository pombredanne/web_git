
<div id="content">


      <div class="left">
   
  <div id="rbox">
            
			  
  	


	
				<div id="focusBox" class="focusBox">
					<div class="hd">
						<ul><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li></ul>
					</div>
					<div class="bd">
						<ul>		 <?php $recent = new WP_Query('meta_key=hot&orderby=date&order=DESC=rand&showposts=5&caller_get_posts=5'); while($recent->have_posts()) : $recent->the_post();?>
							<li>
								<div class="pic"><img src="<?php $values = get_post_custom_values("image_thumb"); echo $values[0]; ?>" alt="<?php echo mb_strimwidth(get_the_title(), 0, 44,"…") ?>" width="300" height="220"/></div>
								<div class="con">    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></div>
							</li>
							  <?php endwhile; ?>
							
						</ul>
					</div>
				</div>
				<script type="text/javascript">jQuery(".focusBox").slide( { mainCell:".bd ul",autoPlay:true, delayTime:0, trigger:"click"} );</script>
	










<div id="tou">
  <?php $recent = new WP_Query('meta_key=tou&orderby=rand&showposts=1&caller_get_posts=1'); while($recent->have_posts()) : $recent->the_post();?>		
    <dl>
      <dt><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"  target="_blank" ><?php the_title(); ?></a></dt>
      <dd><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 180,"...");?>
		   <a href="<?php the_permalink() ?>" target="_blank" >[详细]</a></dd>
	</dl>

  <?php endwhile; ?>
 </div>

<div id="hot2">
  <ol>
  <?php $recent = new WP_Query('meta_key=hot2&orderby=date&order=DESC=rand&showposts=6&caller_get_posts=6'); while($recent->have_posts()) : $recent->the_post();?>		
		  <li>[推荐] <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" ><?php the_title(); ?></a></li> 
 <?php endwhile; ?>

</ol>
</div>

           
	 </div><!--rbox-->

	 <?php
 //Code automatically inserted by Featurific for Wordpress plugin
 if(is_home())                             //If we're generating the home page (remove this line to make Featurific appear on all pages)...
  if(function_exists('insert_featurific')) //If the Featurific plugin is activated...
   insert_featurific();                    //Insert the HTML code to embed Featurific
?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>  
 <ul class="i_list"  <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <div class="i_left_date">
		   <span><?php the_time('m') ?>  <?php the_time('d') ?> </span><br/>
		   <span><?php the_time('Y') ?> </span><br/>
		</div> 
		<h2><a  href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>" target="_blank" ><?php echo mb_strimwidth(get_the_title(), 0, 100,"…") ?></a>
		</h2>
		

		<li class="i_img">
							<?php
							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						?>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><?php the_post_thumbnail( 'thumbnail', array('class' => 'post-thumbnail')); ?></a>
                        <?php } else {?>
                        	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
								<img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="post-thumbnail" />
                            </a>
                        <?php } ?>

         </li>
       <li class="i_date">
		   <span class="i_date_author"> <?php the_author() ?></span>
		   <span class="i_date_category">  <?php the_category(', ') ?></span>
		   <span class="i_date_views"> 热度 <?php if(function_exists('the_views')) { the_views(); print '℃';  } ?></span>
           <span class="i_date_comments"> <?php comments_popup_link('暂无评论', '评论数 1', '评论数 %'); ?></span>
		 
	  </li>
		<li class="i_text" ><?php if (has_excerpt())
						{ ?> 
							<?php the_excerpt() ?>
						<?php
						}
						else{
							echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 280,"...");
						} 
						?>
		</li>
	

  </ul>
	    <?php endwhile; ?>
	<?php endif; ?>



   <div id="pagelist">
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
   </div><!--pagelist-->
 </div><!--left-->


<?php get_sidebar(); ?>



</div><!--content-->
</div><!--cbox-->