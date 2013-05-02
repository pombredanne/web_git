<?php
/**
  Template Name:标签云
 * @package WordPress
 * @subpackage 　Tag-cloud
 */

get_header(); ?>


<div id="content">





      <div class="left">

 <div id="tga-cloud">
 <h2>标签云</h2>

<?php 
$html = '<ul class="post_tags">';
foreach (get_tags( array('number' => 0, 'orderby' => 'name', 'order' => 'DESC', 'hide_empty' => false) ) as $tag){
        $color = dechex(rand(0,16777215));
        $tag_link = get_tag_link($tag->term_id);
                       
        $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}' style='color:#{$color}' target='_blank' >";
        $html .= "{$tag->name} ({$tag->count})</a>";
}
$html .= '</ul>';
echo $html; ?>
  


</div><!--tag-cloud-->



	  </div><!--left-->


		<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>



</div><!--content--></div><!--cbox-->

      
<?php get_footer(); ?>