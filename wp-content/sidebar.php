<?php get_search_form(); ?>
<p class="t">Categories</p>
<ul class="categories">
<?php
$categories = get_categories([
	'orderby'	=> 'name',
	'parent'	=> 0
]);
foreach ($categories as $category) {
	printf('<li><a href="%1$s">%2$s</a></li>',
		esc_url(get_category_link($category->term_id)),
		esc_html($category->name)
	);
}
?>
</ul>
<p class="t">Meta</p>
<ul class="meta">
<li><a href="<?php echo wp_login_url(); ?>">LOGIN</a></li>
<li><a href="<?php bloginfo('atom_url') ?>">ATOM FEED</a></li>
<li><a href="<?php bloginfo('rss2_url') ?>">RSS 2.0 FEED</a></li>
<li><a href="<?php bloginfo('rdf_url') ?>">RDF/RSS 1.0 FEED</a></li>
<li><a href="<?php bloginfo('rss_url') ?>">RSS 0.92 FEED</a></li>
</ul>
<div>theme: lateterm (<a href="https://git.dd86k.space/dd86k/lateterm">Home</a>, <a href="https://github.com/dd86k/lateterm">Github</a>)</div>