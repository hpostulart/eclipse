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


<body id="contact">

<div id="bg_main">

<div id="logo_main"></div>


<!-- Insert Nav -->
<?php include (TEMPLATEPATH . '/nav_main.php'); ?>


<!-- Build Header -->
<div class="header" id="header_contact">
	<div id="header_text">
	
	<!--
		<div class="titleblock"><h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1></div>
		<div class="description"><?php bloginfo('description'); ?></div>
	-->
	
	</div>
</div>


