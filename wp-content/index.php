<?php get_header();

echo('<div class="posts">');

if (is_search()) {
	echo('<h2>Search results for: "'.esc_html(get_search_query(false)).'"</h2>');
}

if (have_posts()) {
	echo('<table>');
	while (have_posts()) {
		the_post();
		echo('<tr>');
		echo('<td>'.esc_html(get_the_time('Y-m-d')).'</td>');
		echo('<td><a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_title()).'</a></td>');
		echo('</tr>');
	}
	echo('</table>');
} else {
	echo('<p>No posts found.</p>');
}

echo('</div>');

get_footer(); ?>