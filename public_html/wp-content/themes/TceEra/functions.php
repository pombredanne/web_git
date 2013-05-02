<?php
if ( function_exists('register_sidebars') )
{
	register_sidebar(array(
		'name' => 'Topbar',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}
//Thumbnail
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

//First Post Image
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

 if(empty($first_img)){ //Defines a default image
		$random = mt_rand(1, 20);
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/random/'.$random.'.jpg';
  }
  return $first_img;
 }
function Yunsd_strimwidth($str ,$start , $width ,$trimmarker ){
	$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
	return $output.$trimmarker;
}
// Custom Comment

function custom_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
         <div class="comment-author vcard">
				<?php echo get_avatar( $comment, $size = '32', $default = 'http://0.gravatar.com/avatar/20644e8d8827d2a2a318b7c76ecd6c52?s=32&d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D32&r=G' ); ?>
                <div class="author_info">
					<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> <?php edit_comment_link(__('(Edit)'),'  ','') ?><br />
                    <em><?php printf(__('%1$s at %2$s'), get_comment_date('Y/m/d '),  get_comment_time(' H:i:s')) ?></em>
                </div>
                <div class="reply">
			   		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
              	</div>
          </div>
		  <?php if ($comment->comment_approved == '0') : ?>
             <em><?php _e('Your comment is awaiting moderation.') ?></em>
             <br />
          <?php endif; ?>

      		<?php comment_text() ?>
     </div>

<?php } ?>
<?php
$themename = "Yunsd";

function Yunsd_add_option() {

	global $themename;

	//create new top-level menu under Presentation
	add_theme_page($themename." 主题设置", "".$themename." 主题设置", 'administrator', basename(__FILE__), 'Yunsd_form');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {

	//register our settings
	register_setting( 'Yunsd-settings', 'Yunsd_key');
	register_setting( 'Yunsd-settings', 'Yunsd_feed_code');
	register_setting( 'Yunsd-settings', 'Yunsd_feed_url');
	register_setting( 'Yunsd-settings', 'Yunsd_feedsky_username');
	register_setting( 'Yunsd-settings', 'Yunsd_site_icp');	
	register_setting( 'Yunsd-settings', 'Yunsd_site_analytics');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_468x60');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_sidebar');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_sidebar2');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_sidebar3');
	register_setting( 'Yunsd-settings', 'Yunsd_site_about');
	register_setting( 'Yunsd-settings', 'Yunsd_description');
	register_setting( 'Yunsd-settings', 'Yunsd_top_info');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_posttop');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_postbottom');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_postbottom2');
	register_setting( 'Yunsd-settings', 'Yunsd_ad_sidebar2');
	register_setting( 'Yunsd-settings', 'Yunsd_bookmark');


}

function Yunsd_form() {

	global $themename;

?>
<!-- Options Form begin -->
<style>
.wrap {width:98%;height:auto;padding:5px;color:#8ac020;border:2px solid #ff6600;border-radius:10px; -webkit-border-radius:10px; -moz-border-radius:10px;-khtml-border-radius:10px; background:url(/fbg.jpg);}
label {color:#8ac020;}
.wrap .regular-text {border:1px solid #ff6600;color:#23a0da;}
.wrap textarea {border:1px solid #f09707;color:#23a0da;}
.wrap a {color:#ff0000;}
.wrap h2  {color:#23a0da;}
</style>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br/></div>
		<h2><?php echo $themename; ?>主题设置     <a href="https://me.alipay.com/skeey" target="_blank">赞助云时代</a></h2>
	<form method="post" action="options.php">
		<?php settings_fields('Yunsd-settings'); ?>
		<table class="form-table">
			<tr valign="top">
            	<td><h3>基本设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>关键字设置<span class="description"></span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" value="<?php echo get_option('Yunsd_key'); ?>" name="Yunsd_key"/>
                    <span class="description">填写你要设置的关键字</span>
                </td>
        	</tr>
			           <tr valign="top">
                <th scope="row"><label>网站描述<span class="description"></span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" value="<?php echo get_option('Yunsd_description'); ?>" name="Yunsd_description"/>
                    <span class="description">填写你的网站描述</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>Feed 订阅地址<span class="description"></span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" value="<?php echo get_option('Yunsd_feed_url'); ?>" name="Yunsd_feed_url"/>
                    <span class="description">留空则输出默认Feed地址</span>
                </td>
				
        	</tr>
			<tr valign="top">
                <th scope="row"><label>FeedSky 用户名<span class="description"></span></label></th>
                <td>
                    <input class="regular-text" type="text" value="<?php echo get_option('Yunsd_feedsky_username'); ?>" name="Yunsd_feedsky_username"/>
                    <span class="description">如果不是FeedSky用户, 可以<a href="http://www.feedsky.com/" target="_blank"><strong>点击这里申请</strong></a> FeedSky用户名和统计功能</span>
                </td>
        	</tr>
		  <tr valign="top">
                <th scope="row"><label>右侧订阅代码<span class="description">(右侧订阅代码)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_feed_code"><?php echo get_option('Yunsd_feed_code'); ?></textarea>
                    <br />
                    <span class="description">右侧订阅代码</span>
                </td>
        	</tr>
 <tr valign="top">
                <th scope="row"><label>ICP备案号<span class="description"></span></label></th>
                <td>
                    <input class="regular-text" style="width:35em;" type="text" value="<?php echo get_option('Yunsd_site_icp'); ?>" name="Yunsd_site_icp"/>
                    <span class="description">备案号设置</span>
                </td>
				
        	</tr>


           
            <tr valign="top">
                <th scope="row"><label>统计代码<span class="description">(网站流量统计)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_site_analytics"><?php echo get_option('Yunsd_site_analytics'); ?></textarea>
                    <br />
                    <span class="description">添加Google Analytics或者其他服务商提供的网站流量统计代码 (显示在网站底部)</span>
                </td>
        	</tr>
			  <tr valign="top">
                <th scope="row"><label>网站顶部简介<span class="description">(用于对网站进行简单介绍)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_top_info"><?php echo get_option('Yunsd_top_info'); ?></textarea>
                    <br />
                    <span class="description">显示在网站顶部</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站简介<span class="description">(用于对网站进行简单介绍)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_site_about"><?php echo get_option('Yunsd_site_about'); ?></textarea>
                    <br />
                    <span class="description">显示在网站底部</span>
                </td>
        	</tr>
  
            <tr valign="top">
                <th scope="row"><label>分享收藏书签<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_bookmark"><?php echo get_option('Yunsd_bookmark'); ?></textarea>
                    <br />
                    <span class="description">添加社会化网络书签功能(比如: <a href="http://digg.com/" target="_blank">Digg</a>、<a href="http://delicious.com/" target="_blank">Del.icio.us</a>、<a href="http://xianguo.com/" target="_blank">鲜果推荐</a>等)</span>
                </td>
                
        	</tr>
            <tr valign="top">
            	<td><h3>广告设置</h3></td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>468X60广告<span class="description">(468X60)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_ad_468x60"><?php echo get_option('Yunsd_ad_468x60'); ?></textarea>
                    <br />
                    <span class="description">广告尺寸不大于 468X60 px </span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>侧边栏顶部<span class="description">(300Xxxx)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_ad_sidebar"><?php echo get_option('Yunsd_ad_sidebar'); ?></textarea>
                    <br />
                    <span class="description">广告宽度不大于 300 px </span>
                </td>
        	</tr>
             <tr valign="top">
                <th scope="row"><label>热门云事排行底部广告<span class="description">(300Xxxx)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_ad_sidebar2"><?php echo get_option('Yunsd_ad_sidebar2'); ?></textarea>
                    <br />
                    <span class="description">广告宽度不大于 300 px </span>
                </td>
        	</tr>
 <tr valign="top">
                <th scope="row"><label>评论底部广告<span class="description">(300Xxxx)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_ad_sidebar3"><?php echo get_option('Yunsd_ad_sidebar3'); ?></textarea>
                    <br />
                    <span class="description">广告宽度不大于 300 px </span>
                </td>
        	</tr>

          <tr valign="top">
                <th scope="row"><label>应用信息左侧广告，不包括资讯 <span class="description">(应用信息左侧)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_ad_posttop"><?php echo get_option('Yunsd_ad_posttop'); ?></textarea>
                    <br />
                    <span class="description">广告宽度不大于 300 px (显示应用信息左侧,)</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>文章底部广告<span class="description">(正文后)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_ad_postbottom"><?php echo get_option('Yunsd_ad_postbottom'); ?></textarea>
                    <br />
                    <span class="description">广告宽度不大于 300 px (显示在正文结束后)</span>
                </td>
        	</tr>
                 <tr valign="top">
                <th scope="row"><label>文章底部广告2<span class="description">(正文后)</span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="Yunsd_ad_postbottom2"><?php echo get_option('Yunsd_ad_postbottom2'); ?></textarea>
                    <br />
                    <span class="description">广告宽度不大于 300 px (显示在正文结束后)</span>
                </td>
        	</tr>     

           
         
           

		</table>

		<p class="submit">
		<h3><input type="submit" name="save" id="button-primary" class="button-primary" value="<?php _e('Save Changes') ?>" />  主题由云时代提供    <a href="http://www.yunsd.net" >  感谢您使用云时代提供的免费主题！</a>   --  <a href="https://me.alipay.com/skeey" target="_blank">赞助云时代</a></h3>
		</p>
  
	</form>
</div>
<!-- Options Form begin -->

<?php } 
	// create custom plugin settings menu
	add_action('admin_menu', 'Yunsd_add_option');
?>
<?php

/* 开始*/
function comment_mail_notify($comment_id) {
  $admin_notify = '1'; // admin 要不要收回复通知 ( '1'=要 ; '0'=不要 )
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改为你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  global $wpdb;
  if ($wpdb->query("Describe {$wpdb->comments} comment_mail_notify") == '')
    $wpdb->query("ALTER TABLE {$wpdb->comments} ADD COLUMN comment_mail_notify TINYINT NOT NULL DEFAULT 0;");
  if (($comment_author_email != $admin_email && isset($_POST['comment_mail_notify'])) || ($comment_author_email == $admin_email && $admin_notify == '1'))
    $wpdb->query("UPDATE {$wpdb->comments} SET comment_mail_notify='1' WHERE comment_ID='$comment_id'");
  $notify = $parent_id ? get_comment($parent_id)->comment_mail_notify : '0';
  $spam_confirmed = $comment->comment_approved;
  if ($parent_id != '' && $spam_confirmed != 'spam' && $notify == '1') {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 发出点, no-reply 可改为可用的 e-mail.
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
       . trim(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复:<br />'
       . trim($comment->comment_content) . '<br /></p>
      <p>您可以点击<a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复的完整內容</a></p>
      <p>还要再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此邮件由系统自动发送，请勿回复.)</p>
    </div>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');
 
/* 自动加勾选栏 */
function add_checkbox() {
  echo '<div id="chklist" style="font-size:14px; "><input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked" /><label for="comment_mail_notify">有人回复时邮件通知我</label></div>';
}
add_action('comment_form', 'add_checkbox');
?>