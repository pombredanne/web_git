	  <div class="right"> 
<div id="sidead" >
		<?php if (get_option('Yunsd_ad_sidebar')) { ?>
        	<?php echo get_option('Yunsd_ad_sidebar'); ?>
        <?php } else { ?>
        	         <?php } ?>
		
	</div>
	   <ul>

	   <li class="li_box">
	    
		<h3 class="green">热门标签</h3>
	    
	       <ul class="inul tagicon" >
              <?php wp_tag_cloud('smallest=12&largest=12&unit=px&number=42');?>
			   </ul>
	   </li>

<div class="clear"></div>


   <li class="li_box">
	    
		<h3 class="red">最新抢先看</h3>
	    
	     
		    <?php query_posts("showposts=10&caller_get_posts=1&orderby=date&order=DESC"); ?>
                      <ul class="inul">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                             <li ><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank" ><?php echo mb_strimwidth(get_the_title(), 0, 45,"…") ?></a></li>
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
                            <li ><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank" ><?php echo mb_strimwidth(get_the_title(), 0, 45,"…") ?></a></li>
                        <?php endwhile; endif; ?><?php wp_reset_query(); ?>
			   </ul>
	   
	   </li>
<div id="sidead" id="sidebar">
		<?php if (get_option('Yunsd_ad_sidebar2')) { ?>
        	<?php echo get_option('Yunsd_ad_sidebar2'); ?>
        <?php } else { ?>
        	         <?php } ?>
		
	</div>
<div class="clear"></div>


 <li class="li_box" >
	    
		<h3 class="green">他/她们都在说</h3>
	    
	      <ul id="newsay">


<?php

                global $wpdb;

                $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,

                comment_post_ID, comment_author, comment_date_gmt, comment_approved,

                comment_type,comment_author_email,comment_author_url,

                SUBSTRING(comment_content,1,30) AS com_excerpt

                FROM $wpdb->comments

                LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =

                $wpdb->posts.ID)

                WHERE comment_approved = '1' AND comment_type = '' AND

                post_password = ''

                ORDER BY comment_date_gmt DESC

                LIMIT 8";
                
                $comments = $wpdb->get_results($sql);

                $output = $pre_HTML;

               
                foreach ($comments as $comment) {

                $output .= "\n<li>". get_avatar( $comment->comment_author_email , '40' )

                ."</a> " 

    . "<span class='comment_author'>" . strip_tags($comment->comment_author)

                ."</span><br />" . "<a href=\"" . get_permalink($comment->ID) .

                "#comment-$comment->ID" . $comment->comment_content . "\" title=\"" .

                $comment->post_title . "\">" . strip_tags($comment->com_excerpt)

                ."</a></li>";

                }

               

                $output .= $post_HTML;

                echo $output;

            ?>





		
		</ul>

	   
	   </li>

<div class="clear"></div>
	<?php  if ( is_home()) { ?>
<div id="sidead">
		<?php if (get_option('Yunsd_ad_sidebar3')) { ?>
        	<?php echo get_option('Yunsd_ad_sidebar3'); ?>
        <?php } else { ?>
        	         <?php } ?>
		
	</div>
 <li class="li_box">
	    
		<h3 class="blue">友情链接</h3>
	    
	       <ul class="link_list">
		    <?php
        
        $bookmarks = get_bookmarks('title_li'); //全部链接随机输出
        //如果你要输出某个链接分类的链接，更改一下get_bookmarks参数即可
        //如要输出链接分类ID为5的链接 title_li=&categorize=0&category=5&orderby=rand
        if ( !empty($bookmarks) ) {
            foreach ($bookmarks as $bookmark) {
            echo '<li><a href="' , $bookmark->link_url , '" title="' , $bookmark->link_description , '" target="_blank" >' , $bookmark->link_name , '</a></li>';
            }
        }
        ?>
			   </ul>
	   
	   </li>

   <?php } ?>




	   </ul></div><!--right-->