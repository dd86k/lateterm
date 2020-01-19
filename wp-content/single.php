<?php get_header(); the_post(); ?>
<header>
<h1><?php the_title(); ?></h1>
<?php the_time(get_option('date_format')); ?><br>
<?php the_author(); ?>
</header>
<p><?php the_content(); ?></p>
<hr>
<div>
<span><?php previous_post_link('<- %link'); ?> </span>
<span style="float: right;"><?php next_post_link('%link ->'); ?></span>
</div>
<hr>
<?php
if (comments_open() || get_comments_number()) {
	comments_template();
}
get_sidebar();
get_footer(); 
?>