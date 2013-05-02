	  <div class="right"> 

	   <ul>


   <li class="li_box">
	    
		<h3 class="red">最新抢先看</h3>
	    
	     
		    <?php query_posts("showposts=10&caller_get_posts=1&orderby=date&order=DESC"); ?>
                      <ul class="inul">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                             <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank" ><?php echo mb_strimwidth(get_the_title(), 0, 40,"…") ?></a></li>
                        <?php endwhile; endif; ?>
                        </ul>
	   
	   </li>
<div class="clear"></div>
 <li class="li_box">
	    
		<h3 class="red">近期热门趋势</h3>
	    
	  
		  <?php
			  function filter_where($where = '') {
				//posts in the last 30 days
				$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
				return $where;
			  }
			add_filter('posts_where', 'filter_where');
			query_posts("showposts=10&v_sortby=views&caller_get_posts=1&orderby=date&order=desc") ?>
                      <ul class="inul">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank" ><?php echo mb_strimwidth(get_the_title(), 0, 40,"…") ?></a></li>
                        <?php endwhile; endif; ?><?php wp_reset_query(); ?>
			   </ul>
	   
	   </li>

<div class="clear"></div>










	   </ul></div><!--right-->