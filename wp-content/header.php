<!DOCTYPE html prefix="og: https://ogp.me/ns#">
<html <?php language_attributes(); ?>>
<head>
<title><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta property="og:title" content="<?= esc_attr(wp_get_document_title()) ?>" />
<meta property="og:type" content="<?= is_single() ? 'article' : 'website' ?>" />
<meta property="og:url" content="<?= esc_url(get_permalink()) ?>" />
<meta property="og:image" content="<?= esc_url(get_the_post_thumbnail_url(null, 'large') ?: get_site_icon_url(512) ?: get_template_directory_uri() . '/assets/default-og.jpg') ?>" />
<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<style>
body {
  color: <?php echo esc_attr( get_theme_mod( 'lateterm_font_color', 'white' ) ); ?>;
  background-color: <?php echo esc_attr( get_theme_mod( 'lateterm_bg_color', '#000084' ) ); ?>;
  font-family: <?php echo esc_attr( get_theme_mod( 'lateterm_font_family', 'monospace' ) ); ?>;
	font-size: <?php echo esc_attr( get_theme_mod( 'lateterm_font_size', '18px' ) ); ?>;
}
.pagecontent {
  max-width: <?php echo esc_attr( get_theme_mod( 'lateterm_max_width', '70em' ) ); ?>;
	margin: 0 auto;
}
</style>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
<nav>
<?php wp_nav_menu(); ?>
</nav>
<div class="pagecontent">
<div class="popmain">
  <h1 class="title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
  <h2 class="title"><?php bloginfo('description'); ?></h2>
</div>
<div class="content">
  <div class="sidebar"><?php get_sidebar(); ?></div>
<div class="main">