<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title> <?php bloginfo('name'); ?>     <?php wp_title(); ?></title>

<?php include (TEMPLATEPATH . '/seo-meta.php'); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

<?php wp_head(); ?>
<?php include (TEMPLATEPATH . '/google-analytics.php'); ?>
</head>


<body id="home">

<div id="bg_main">

<div id="logo_main"></div>


<!-- Insert Nav -->
<?php include (TEMPLATEPATH . '/nav_main.php'); ?>


<!-- Build Header -->
<div class="header" id="header_home">
	<div id="header_text">
	
<object width="980" height="200">	<param name="allowfullscreen" value="false" />	<param name="allowscriptaccess" value="always" />	<param name="movie" value="<?php bloginfo('template_directory'); ?>/images/homepage-slideshow.swf" />	<embed src="<?php bloginfo('template_directory'); ?>/images/homepage-slideshow.swf" type="application/x-shockwave-flash" allowfullscreen="false" allowscriptaccess="always" width="980" height="200" bgcolor="#000000"></embed></object>



	
	</div>
</div>


