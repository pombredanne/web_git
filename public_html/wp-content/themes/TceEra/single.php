<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>


<div id="content">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


      <div class="left left_bg">
	<div id="entry_box">
	<div id="authorimg"><?php echo get_avatar( get_the_author_email(), '60' );?></div>
	<div id="entry_title"><h2><?php the_title(); ?> </h2></div><!--entry_title-->
	<div id="entry_info">TIME：<?php the_time('Y年m月d日') ?> AUTHOR：<?php the_author() ?> CATEGORY：<?php the_category(', ') ?> 流行热度：<?php if(function_exists('the_views')) { the_views(); print '℃';  } ?> </div><!--entry_info-->

<div id="hrline"></div>

 <div id="entry_app">
 
 
   
 
 </div>

<div id="bookmark">
	
	 <ul id="bookL">
	 <li><!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
        <span class="bds_more">分享到：</span>
        <a class="bds_baidu"></a>
        <a class="bds_qq"></a>
        <a class="bds_hi"></a>
        <a class="bds_tieba"></a>
        <a class="bds_copy"></a>
		<a class="shareCount"></a>
    </div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=731933" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END --></li>
<li>


<a href="javascript:;" class="tmblog" id="share_btn_qq"><img src="http://mat1.gtimg.com/app/opent/images/websites/share/b24.png" border="0" alt="转播到腾讯微博"></a>

<script src="http://mat1.gtimg.com/app/opent/js/qshare_min.js"></script>
<script>
_share_tencent_weibo({
	"appkey":"801166073"	/*你从腾讯微博开放平台获得的appkey*/
	,"btn":document.getElementById("share_btn_qq")	/*一键转播按钮*/
	,"qshareable":false	/*不绑定Q-Share功能*/
	,"assname":"undefined"	/*转播后收听的微博帐号*/
});
</script>
</li>
<li>
<script type="text/javascript" charset="utf-8">
(function(){
  var _w = 106 , _h = 24;
  var param = {
    url:location.href,
    type:'5',
    count:'', /**是否显示分享数，1显示(可选)*/
    appkey:'', /**您申请的应用appkey,显示分享来源(可选)*/
    title:'', /**分享的文字内容(可选，默认为所在页面的title)*/
    pic:'', /**分享图片的路径(可选)*/
    ralateUid:'', /**关联用户的UID，分享微博会@该用户(可选)*/
	language:'zh_cn', /**设置语言，zh_cn|zh_tw(可选)*/
    rnd:new Date().valueOf()
  }
  var temp = [];
  for( var p in param ){
    temp.push(p + '=' + encodeURIComponent( param[p] || '' ) )
  }
  document.write('<iframe allowTransparency="true" frameborder="0" scrolling="no" src="http://hits.sinajs.cn/A1/weiboshare.html?' + temp.join('&') + '" width="'+ _w+'" height="'+_h+'"></iframe>')
})()
</script>
</li>
<li>

<script type="text/javascript">
(function(){
var p = {
url:location.href,
showcount:'0',/*是否显示分享总数,显示：'1'，不显示：'0' */
desc:'',/*默认分享理由(可选)*/
summary:'',/*分享摘要(可选)*/
title:'',/*分享标题(可选)*/
site:'',/*分享来源 如：腾讯网(可选)*/
pics:'', /*分享图片的路径(可选)*/
style:'101',
width:142,
height:30
};
var s = [];
for(var i in p){
s.push(i + '=' + encodeURIComponent(p[i]||''));
}
document.write(['<a version="1.0" class="qzOpenerDiv" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?',s.join('&'),'" target="_blank">分享</a>'].join(''));
})();
</script>
<script src="http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201" charset="utf-8"></script>
</li>	
</ul>
	</div>
<div id="entry">

<?php the_content('Read more...'); ?>
	 <?php wp_link_pages( array( 'before' => '<p class="pages">' . __( '日志分页:'), 'after' => '</p>' ) ); ?>		

<span style="font-weight:600;color:red;"><script src="<?php bloginfo('template_directory');?>/js/sp.js"></script></span>
</div><!--enrty-->
<div id="enrty_con_ads">

         <div id="enrty_con_left">
		 <span class="conblockl">
<?php echo get_option('Yunsd_ad_postbottom'); ?>
   </span>

         </div>
         <div id="enrty_con_right">
		 <span class="conblockl">
		 <?php echo get_option('Yunsd_ad_postbottom2'); ?>
		 </span>
 
         </div>
  
</div>

  <div id="entry_tag">标签： <?php the_tags('', '', ''); ?></div><!--entry_tag-->
   	<?php endwhile; else: ?>
	<?php endif; ?>

<div id="ratings">
<h3>评分支持下:</h3>
<div id="entry_ratings" >
<?php if(function_exists('the_ratings')) { the_ratings(); } ?> 
</div>
</div>

  <div id="hrline"></div>
 <div id="con">
<ul id="tags">
  <li class="selectTag"><a onClick="selectTag('tagContent0',this)" 
  href="javascript:void(0)"> 相关文章推荐</a> </li>
  <li ><a onClick="selectTag('tagContent1',this)" 
  href="javascript:void(0)">随便点击看看</a> </li>
 </ul>
<div id="tagContent">
<div class="tagContent  selectTag" id="tagContent0">
<div id="entry_list">
	 
	
	 <ul>
<?php
$cats = wp_get_post_categories($post->ID);
if ($cats) {
$args = array(
        'category__in' => array( $cats[0] ),
        'post__not_in' => array( $post->ID ),
        'showposts' => 6,
        'caller_get_posts' => 1
    );
query_posts($args);

if (have_posts()) : 
    while (have_posts()) : the_post(); update_post_caches($posts); ?>


	  <li>
	  
	  
	 <?php
							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						?>
							<a class="entry_l_img" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" ><?php the_post_thumbnail( 'thumbnail', array('class' => 'post-thumbnail')); ?></a>
                        <?php } else {?>
                        	<a  class="entry_l_img" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank">
								<img src="<?php echo catch_that_image() ?>" width="100" height="100" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="post-thumbnail" />
                            </a><?php } ?>
	  
	  <span class="entry_l_t"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php echo mb_strimwidth(get_the_title(), 0, 30,"…") ?></a></span>
	  
	  <span class="entry_l_c"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,"...");?><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"></a></span>


	  </li>
<?php endwhile; else : ?>
<li> 暂无相关文章</li>
<?php endif; wp_reset_query(); } ?>




	</ul>

	</div><!--entry_list--></div>
<div class="tagContent" id="tagContent1">		
	<div id="entry_list">
	     
	  <?php wp_reset_query(); ?>
	   <?php query_posts("showposts=10&caller_get_posts=1&order=DESC&orderby=rand"); ?>

                         <ul>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <li>
	  
	  
	 <?php
							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						?>
							<a class="entry_l_img" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" ><?php the_post_thumbnail( 'thumbnail', array('class' => 'post-thumbnail')); ?></a>
                        <?php } else {?>
                        	<a  class="entry_l_img" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank">
								<img src="<?php echo catch_that_image() ?>" width="100" height="100" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="post-thumbnail" />
                            </a><?php } ?>
	  
	  <span class="entry_l_t"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php echo mb_strimwidth(get_the_title(), 0, 30,"…") ?></a></span>
	  
	  <span class="entry_l_c"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,"...");?><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"></a></span>


	  </li>
                                   <?php endwhile ?>
                                    <?php endif ?>
			   </ul>
	       <?php wp_reset_query(); ?>
	 

			</div>
	</div><!--entry_list-->

</div></div>
<div class="clear"></div>
<div id="wumiiDisplayDiv"></div>
	<div id="hrline"></div>
<div class="clear"></div>
    <div id="entry_ping">
	<?php comments_template(); ?>	
	<script type="text/javascript">
(function(){
var url = "http://widget.weibo.com/distribution/comments.php?width=0&url=auto&fontsize=12&appkey=3754989990&dpc=1";
url = url.replace("url=auto", "url=" + document.URL); 
document.write('<iframe id="WBCommentFrame" src="' + url + '" scrolling="no" frameborder="0" style="width:100%"></iframe>');
})();
</script>
<script src="http://tjs.sjs.sinajs.cn/open/widget/js/widget/comment.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
window.WBComment.init({
    "id": "WBCommentFrame"
});
</script>	
    </div><!--entry_ping"-->

	 </div><!--enrty_box--> 
	  </div><!--left-->


<?php get_sidebar(); ?>



</div><!--content-->
</div><!--cbox-->

      
<?php get_footer(); ?>