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
    <li> 2012-2013 COPYRIGHT BY  <?php bloginfo('name'); ?> </li>
  </ol>
 </div>
</div><!--footer_left-->


<div class="footer_right">
  <ul>
   <h3>Hello <?php bloginfo('name'); ?></h3>
   <li><?php echo get_option('Yunsd_site_about'); ?></li>
  </ul>

<!--footer_right-->

</div>
</div><!--footer-->
<?php wp_footer(); ?>

</body><!--boyd-->
<div id="fboy">
<div id="fboym">
</div>
</div>
</html>