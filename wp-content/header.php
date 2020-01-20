<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php the_title(); ?></title>
<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
<nav>
<?php wp_nav_menu(); ?>
</nav>
<div class="popmain">
<h1 class="title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<h2 class="title"><?php bloginfo('description'); ?></h2>
</div>
<div class="content">
<div class="sidebar">
<?php
get_search_form();
get_sidebar();
wp_nav_menu(); ?>
<p>theme: <a href="https://git.dd86k.space/lateterm">lateterm</a></p>
</div>
<div class="main">