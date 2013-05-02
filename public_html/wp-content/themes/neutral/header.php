<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php wp_title(''); if (function_exists('is_tag') and is_tag()) { ?><?php } if (is_archive()) { ?><?php } elseif (is_search()) { ?><?php echo $s; } if ( !(is_404()) and (is_search()) or (is_single()) or (is_page()) or (function_exists('is_tag') and is_tag()) or (is_archive()) ) { ?><?php _e(' | '); ?><?php } ?><?php bloginfo('name'); ?></title>
<meta name="description" content="<?php if (is_home()): echo bloginfo('description'); else: echo the_title(); endif; ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/comment-style.css" type="text/css" />
<?php if (strtoupper(get_locale()) == 'JA') ://to fix the font-size for japanese font ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/japanese.css" type="text/css" />
<?php endif; ?>
<!--[if lt IE 7]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" />
<![endif]--> 

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.page-scroller.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jscript.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comment.js"></script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_head(); ?>
</head>

<body>
<div id="wrapper">

 <div id="header">

  <div id="logo">
  <?php $options = get_option('neutral_options'); if ($options['use_logo']): ?>
   <a href="<?php echo get_option('home'); ?>/" id="logo_image"><img src="<?php bloginfo('template_url'); ?>/img/<?php echo $options['logo_name']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
   <?php else: ?>
   <a href="<?php echo get_option('home'); ?>/" id="logo_text"><?php bloginfo('name'); ?></a>
   <?php if (is_home()): ?>
   <h1 id="description"><?php bloginfo('description'); ?></h1>
   <?php else: ?>
   <h2 id="description"><?php bloginfo('description'); ?></h2>
   <?php endif; ?>
  <?php endif; ?> 
  </div>
  
  <div id="header_meta">
   <?php if ($options['header_search']) { ?>
   <div id="header_search_area"<?php if (!$options['header_rss']&&!$options['header_twitter']) : echo ' style="margin-right:0;"'; endif; ?>>
    <?php if ($options['use_google_search']) : ?>
    <form action="http://www.google.com/cse" method="get" id="searchform">
     <div>
      <input type="text" value="<?php _e('Google Search','neutral'); ?>" name="q" id="search_input" onfocus="this.value=''; changefc('#333');" />
     </div>
     <div>
      <input type="image" src="<?php bloginfo('template_url'); ?>/img/search_button.gif" name="sa" alt="<?php _e('Search from this blog.','neutral'); ?>" title="<?php _e('Search from this blog.','neutral'); ?>" id="search_button" />
      <input type="hidden" name="cx" value="<?php echo $options['custom_search_id']; ?>" />
      <input type="hidden" name="ie" value="UTF-8" />
     </div>
    </form>
    <?php else: ?>
    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
     <div><input type="text" value="<?php _e('Search','neutral'); ?>" name="s" id="search_input" onfocus="this.value=''; changefc('#333');" /></div>
     <div><input type="image" src="<?php bloginfo('template_url'); ?>/img/search_button.gif" alt="<?php _e('Search from this blog.','neutral'); ?>" title="<?php _e('Search from this blog.','neutral'); ?>" id="search_button" /></div>
    </form>
    <?php endif; ?>
   </div>
   <?php }; ?>
   <?php if ($options['header_rss']) : ?>
   <a href="<?php bloginfo('rss2_url'); ?>" id="header_rss" title="<?php _e('RSS','neutral'); ?>" ><?php _e('RSS','neutral'); ?></a>
   <?php endif; ?>
   <?php if ($options['header_twitter']) : ?>
   <a href="<?php echo $options['twitter_url']; ?>" id="header_twitter" title="<?php _e('Twitter','neutral'); ?>" ><?php _e('Twitter','neutral'); ?></a>
   <?php endif; ?>
  </div><!-- END #header_meta -->

  <div id="header_menu">
   <ul class="menu" id="menu">
    <li class="<?php if (!is_paged() && is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/"><?php _e('HOME','monochrome'); ?></a></li>
    <?php
        if($options['header_menu_type'] == 'pages') {
        wp_list_pages('sort_column=menu_order&depth=0&title_li=&exclude=' . $options['exclude_pages']);
        } else {
        wp_list_categories('depth=0&title_li=&exclude=' . $options['exclude_category']);
        }
    ?>
   </ul>
  </div><!-- END #header_menu -->

 </div><!-- END #header -->