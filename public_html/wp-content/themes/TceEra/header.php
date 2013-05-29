<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?>搜索到关于“<?php echo $s; ?>” 的内容- <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404页面 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>文章列表 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_tag() ) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?><?php the_time('F, Y'); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_day() ) { ?><?php the_time('F j, Y'); ?> - <?php bloginfo('name'); ?><?php } ?>
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

 <?php if ( is_singular() ){ ?>
 <script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
 <?php } ?><link href="<?php bloginfo('template_directory');?>/style.css" rel="stylesheet" type="text/css" />
 <?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jQuery.blockUI.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/tcejs.js"></script>
</head>
<div id="top_line"></div>
<div id="tboym">
<div id="tboy"></div>
</div>
<body>
<!--[if lte IE 6]>
<div style="background-color:#FF6600;margin:5px 0 5px 0;padding:3px 10px 3px 10px;border-color:#ccc; border-style:solid;border-width:2px;color:#fff;">

<p><font size="2"><strong>hi~~欢迎光临<?php bloginfo('name'); ?>！</strong>，您目前使用的是过时版本，安全性能差的 <del>IE 6.0 浏览器</del>，<?php bloginfo('name'); ?>在IE 6.0过时浏览器下显示会不完整，建议使用更快、更安全、最新版本浏览器！ 推荐：<big><a target="_blank" href="http://www.firefox.com.cn/download/"><u>Firefox</u></a></big>、<a target="_blank" href="http://www.opera.com">Opera</a>、<a target="_blank" href="http://www.google.com/chrome">Google Chrome</a>、<a target="_blank" href="http://www.apple.com/safari/">Safari</a> 或 <a target="_blank" href="http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie-8">IE8.0</a>。</font></p>

</div>
<![endif]-->
<div id="top_ibox">
<div id="top_info">
<div class="top_info_left"><?php echo get_option('Yunsd_top_info'); ?>

</div>



			
			</div>
				 

<div id="top">

  <div class="logo"><a href="<?php echo get_option('home'); ?>/" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" ><img src="<?php bloginfo('template_directory'); ?>/logo.png" alt="<?php bloginfo('name'); ?>"/></a></div><!--logo-->
  
  <div class="top_bannar">
  
  </div>
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
</div>
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
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> » <?php the_category(', ') ?> > 阅读文章
          <?php /* If this is a page */ } elseif (is_page()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>">首页</a> » <?php the_title(); ?>
          <?php /* If this is a 404 error page */ } elseif (is_404()) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a> » 404 错误
          <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                你的位置: <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a> » 存档
          <?php } ?>
		

</div>
