<?php get_header(); the_post(); ?>
<header>
<h1><?php the_title(); ?></h1>
</header>
<p><?php the_content(); ?></p>
<hr>
<?php
get_sidebar();
get_footer(); 
?>