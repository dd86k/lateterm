<?php get_header();

echo('<div class="posts">');

if (is_search()) {
	echo('<h2>Search results for: "'.get_search_query().'"</h2>');
} else if (have_posts()) {
	echo('<table>');
	 while (have_posts()) {
		the_post();
		echo('<tr>');
		echo('<td>'.get_the_time('Y-m-d').'</td>');
		echo('<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>');
		echo('</tr>');
	}
	echo('</table>');
}

echo('</div>');

get_footer(); ?>