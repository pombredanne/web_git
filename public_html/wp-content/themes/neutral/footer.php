 <div id="footer">
  <ul id="copyright">
   <li style="background:none;"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></li>
   <li><a href="http://www.nixlong.com/"><?php _e('www.nixlong.com','neutral'); ?></a></li>
  </ul>
  <?php $options = get_option('neutral_options'); if ($options['pagetop']) : ?>
  <a href="#wrapper" id="return_top"><?php _e('Return top','neutral'); ?></a>
  <?php endif; ?>
 </div><!-- END #footer -->

</div><!-- END #wrapper -->
<script type="text/javascript">
var menu=new menu.dd("menu");
menu.init("menu","menuhover");
</script>
<?php wp_footer(); ?>
</body>
</html>