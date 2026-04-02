<?php get_header(); the_post(); ?>
<header>
<h1><?php the_title(); ?></h1>
</header>
<div><?php the_content(); ?></div>
<hr>
<?php
get_sidebar();
get_footer(); 
?>