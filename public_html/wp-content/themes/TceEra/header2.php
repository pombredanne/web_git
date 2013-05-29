<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php if ( is_home() ) { ?><? bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?>搜索到关于“<?php echo $s; ?>” 的内容- <? bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404页面 - <? bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>文章列表 - <? bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?> - <? bloginfo('name'); ?><?php } ?>
<?php if ( is_tag() ) { ?><?php wp_title(''); ?> - <? bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?> - <? bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> - <? bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?><?php the_time('F, Y'); ?> - <? bloginfo('name'); ?><?php } ?>
<?php if ( is_day() ) { ?><?php the_time('F j, Y'); ?> - <? bloginfo('name'); ?><?php } ?>
</title>
<?php
if (!function_exists('utf8Substr')) {
 function utf8Substr($str, $from, $len)
 {
     return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
          '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
          '$1',$str);
 }
}
if ( is_single() ){
    if ($post->post_excerpt) {
        $description  = $post->post_excerpt;
    } else {
   if(preg_match('/<p>(.*)<\/p>/iU',trim(strip_tags($post->post_content,"<p>")),$result)){
    $post_content = $result['1'];
   } else {
    $post_content_r = explode("\n",trim(strip_tags($post->post_content)));
    $post_content = $post_content_r['0'];
   }
         $description = utf8Substr($post_content,0,220);  
  } 
    $keywords = "";     
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {
        $keywords = $keywords . $tag->name . ",";
    }
}
?>
<?php echo "\n"; ?>
<?php if ( is_single() ) { ?>
<meta name="description" content="<?php echo trim($description); ?>" />
<meta name="keywords" content="<?php echo rtrim($keywords,','); ?>" />
<?php } ?>
<?php if ( is_home() ) { ?>
<meta name="keywords" content=" <?php echo get_option('Yunsd_key'); ?>" />
<meta name="description" content="<?php echo get_option('Yunsd_description'); ?>" />
<?php } ?>

<script src="<?php bloginfo('template_directory');?>/js/jquery-1.4a2.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory');?>/js/jquery.KinSlideshow-1.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
	// navi Menu
	$(function() {
		$("#dropmenu ul").css({display: "none"}); // Opera Fix
		$("#dropmenu li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown("normal");
		},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	});
	
	$(function() {
		$("#dropmenu a").addClass("png");
	});
	
</script>

 <?php if ( is_singular() ){ ?>
 <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
 <?php } ?>
<script type="text/javascript">
   $(function(){
        $("#KinSlideshow").KinSlideshow({
                moveStyle:"right",
                titleBar:{titleBar_height:30,titleBar_bgColor:"#08355c",titleBar_alpha:0.5},
                titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"bold"},
                btn:{btn_bgColor:"#333333",btn_bgHoverColor:"#1072aa",btn_fontColor:"#ffffff",
                     btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#23a0da",
                     btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
        });
    })

</script>
 <script language="JavaScript" type="text/JavaScript">
<!--
function toggle(targetid){
     if (document.getElementById){
         target=document.getElementById(targetid);
             if (target.style.display=="block"){
                 target.style.display="none";
             } else {
                 target.style.display="block";
             }
     }
}
-->
</script>
<link href="<?php bloginfo('template_directory');?>/style.css" rel="stylesheet" type="text/css" />
 <?php wp_head(); ?>
</head>

<body>
<!--[if lte IE 6]>
<div style="background-color:#FF6600;margin:5px 0 5px 0;padding:3px 10px 3px 10px;border-color:#ccc; border-style:solid;border-width:2px;color:#fff;">

<p><font size="2"><strong>hi~~欢迎光临<? bloginfo('name'); ?>！</strong>，您目前使用的是过时版本，安全性能差的 <del>IE 6.0 浏览器</del>，<? bloginfo('name'); ?>在IE 6.0过时浏览器下显示会不完整，建议使用更快、更安全、最新版本浏览器！ 推荐：<big><a target="_blank" href="http://www.firefox.com.cn/download/"><u>Firefox</u></a></big>、<a target="_blank" href="http://www.opera.com">Opera</a>、<a target="_blank" href="http://www.google.com/chrome">Google Chrome</a>、<a target="_blank" href="http://www.apple.com/safari/">Safari</a> 或 <a target="_blank" href="http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie-8">IE8.0</a>。</font></p>

</div>
<![endif]-->
<div id="top_info">
<div class="top_info_left"><?php echo get_option('Yunsd_top_info'); ?>

</div>


<div id="yunsd">		
	  <div class="feedsky">
       <a href="#" onclick="toggle('div1')" class="feedzoom" ><img src="<?php bloginfo('template_directory');?>/images/rss.gif"/></a>
	  <div id="div1" class="div">

		<?php if (get_option('Yunsd_feed_code')) { ?>
				<?php echo get_option('Yunsd_feed_code'); ?>
			<?php } else { ?>
				<a href="<?php bloginfo('rss2_url'); ?>" title="<? bloginfo('name'); ?>" target="_blank" class="rssfeed">订阅<? bloginfo('name'); ?></a>
			<?php } ?>
	</div>
	  </div>

		
			
            <?php if (get_option('Yunsd_feedsky_username')) { ?>
				<img id="feedimage" src="http://www.feedsky.com/feed/<?php echo get_option('Yunsd_feedsky_username'); ?>/sc/gif" alt="订阅统计"/>
			<?php } else { ?>
				<img id="feedimage" src="http://www.feedsky.com/feed/yunsd/sc/gif"  target="_blank" alt="订阅统计" />
			<?php } ?></div></div>
				 

<div id="top">

  <div class="logo"><a href="<?php echo get_option('home'); ?>/" alt="<? bloginfo('name'); ?>" title="<? bloginfo('name'); ?>" ><img src="<?php bloginfo('template_directory'); ?>/logo.png" alt="<? bloginfo('name'); ?>"/></a></div><!--logo-->
  
  <div class="top_bannar"></div>
  <div class="ser">
   <form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/" >
	<div><label class="screen-reader-text" for="s"></label></div>
   
	<div class="bbut"><input type="text"  name="s" title="Search" class="searchinput" id="searchinput" onkeydown="if (event.keyCode==13) {}" onblur="if(this.value=='')value='&nbsp;搜索点什么...';" onfocus="if(this.value=='&nbsp;搜索点什么...')value='';" value="&nbsp;搜索点什么..." size="10"/>
	</div>
	<div class="tbut"><input type="submit" class="searchaction" onclick="if(document.forms['search'].searchinput.value=='&nbsp;搜索点什么...')document.forms['search'].searchinput.value='';" alt="Search" title="Search" value="" hspace="2"/>
	</div>
	</form>

</div><!--ser-->
</div><!--top-->

<div id="nav">
   <ul id="dropmenu" class="navi">
        <li <?php if ( is_home()){ echo ' class="cat-item current-cat" '; } ?>><a href="<?php echo get_option('home'); ?>/" class="png"><span class="png">首页</span></a></li>
			<?php echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span class="png">$3</span></a>', wp_list_categories('echo=0&title_li=&depth=2&hide_empty=1')); ?>
			<?php wp_list_pages('depth=1&sort_column=menu_order&title_li='); ?>
        </ul>
</div><!--nav-->


<div id="cbox">
<div id="map">	
 
		  <?php /* If this is a category archive */ if (is_home()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> 
          <?php /* If this is a tag archive */ } elseif(is_category()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> » <?php the_category(' / ') ?>
          <?php /* If this is a search result */ } elseif (is_search()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> » 搜索关于 <?php echo $s; ?> 的内容
          <?php /* If this is a tag archive */ } elseif(is_tag()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页></a> »  搜索<?php single_tag_title(); ?>
          <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> »搜索<?php the_time('Y, F jS'); ?> 时间内的文章
          <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> »搜索<?php the_time('Y, F'); ?> 时间内的文章
          <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">搜索<?php bloginfo('name'); ?></a> »搜索<?php the_time('Y'); ?> 时间内的文章
          <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> » 作者文章
          <?php /* If this is a single page */ } elseif (is_single()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> » <?php the_category(', ') ?> > <?php the_title();?> 
          <?php /* If this is a page */ } elseif (is_page()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> » <?php the_title(); ?>
          <?php /* If this is a 404 error page */ } elseif (is_404()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a> » 404 错误
          <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a> » 存档
          <?php } ?>
		
<?php  if (is_home()) { ?>
                
         

 
<ul class="hotnav"><?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'hot-menu', 'echo' => false)) )); ?>
		
		</ul> 
		 <?php /* If this is a tag archive */ } elseif(is_category()) { ?>
		<ul class="hotnav"><?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'hot-menu', 'echo' => false)) )); ?> </ul> 

    <?php /* If this is a tag archive */ } elseif(is_tag()) { ?>

	 		<ul class="hotnav"><?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'hot-menu', 'echo' => false)) )); ?> </ul> 
		<?php } ?>
</div>
