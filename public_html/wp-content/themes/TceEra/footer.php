<div class="hrbug"></div>
<div id="footer">

<div id="footerbox">
<div class="footer_left">
<ul>

			
					<?php wp_list_pages('depth=1&sort_column=menu_order&title_li='); ?>
			
	

    <li><?php echo get_option('Yunsd_site_analytics'); ?></li>
  <li><a href="#"><?php echo get_option('Yunsd_site_icp'); ?></a></li>
</ul>
<div class="bline"> 

  <ol>
    <li>THEMES  DESIGN <a href="http://www.yunsd.net/" target="_blank" title="主题设计">YUNSD.NET</a></li>
    <li> 2011-2012 COPYRIGHT BY  <?php bloginfo('name'); ?> </li>
  </ol>
 </div>

</div><!--footer_left-->


<div class="footer_right">
  <ul>
   <h3>Hello <?php bloginfo('name'); ?></h3>
   <li><?php echo get_option('Yunsd_site_about'); ?></li>
</ul>

<div class="bline"><?php echo get_option('Yunsd_site_about2'); ?>		  <div id="yunsd">		<?php if (get_option('Yunsd_feed_url')) { ?>
				<a href="<?php echo get_option('Yunsd_feed_url'); ?>" title="<?php bloginfo('name'); ?>" target="_blank" class="rssfeed"><img src="<?php bloginfo('template_directory');?>/images/rss.png"/></a>
			<?php } else { ?>
				<a href="<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?>" target="_blank" class="rssfeed"><img src="<?php bloginfo('template_directory');?>/rss.png"/></a>
			<?php } ?>
			
            <?php if (get_option('Yunsd_feedsky_username')) { ?>
				<img id="feedimage" src="http://www.feedsky.com/feed/<?php echo get_option('Yunsd_feedsky_username'); ?>/sc/gif" alt="订阅统计"/>
			<?php } else { ?>
				<img id="feedimage" src="http://www.feedsky.com/feed/yunsd/sc/gif"  target="_blank" alt="订阅统计" />
			<?php } ?> <a href="http://cn.wordpress.org/" target="_blank" > <img src="<?php bloginfo('template_directory');?>/images/fwp.png"/>  使用 WORDPRESS 创作</a></div>
	</div>
    
</div><!--footer_right-->
</div>
</div><!--footer-->
<?php wp_footer(); ?>

</body><!--boyd-->
<div id="fboy">
<div id="fboym">
</div>
</div>
</html>