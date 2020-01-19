<?php get_header(); ?>
<div class="posts">
<?php
if (is_search()) {
	esc_html__( 'Search Results for: %s', 'cock');
} elseif (have_posts()) {
	 while (have_posts()) {
		 the_post(); ?>
	<table>
	<td><?php the_time('Y-m-d') ?></td>
	<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
	</table>
<?php 	}
 } else { ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php } ?>
</div>
<?php get_footer(); ?>