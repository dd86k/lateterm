<?php
if (get_theme_mod('lateterm_show_search', true)) {
	get_search_form();
}
?>
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
<p class="t">Links</p>
<ul class="meta">
<?php if (get_theme_mod('lateterm_show_login_button', true)) { ?>
	<li><a href="<?php echo wp_login_url(); ?>">LOGIN</a></li>
<?php } ?>
<?php if (get_theme_mod('lateterm_show_atom_button', true)) { ?>
	<li><a href="<?php bloginfo('atom_url') ?>">ATOM FEED</a></li>
<?php } ?>
<?php if (get_theme_mod('lateterm_show_rss20_button', true)) { ?>
	<li><a href="<?php bloginfo('rss2_url') ?>">RSS 2.0 FEED</a></li>
<?php } ?>
<?php if (get_theme_mod('lateterm_show_rss10_button', true)) { ?>
	<li><a href="<?php bloginfo('rdf_url') ?>">RDF/RSS 1.0 FEED</a></li>
<?php } ?>
<?php if (get_theme_mod('lateterm_show_rss092_button', true)) { ?>
	<li><a href="<?php bloginfo('rss_url') ?>">RSS 0.92 FEED</a></li>
<?php } ?>
</ul>
<div><a href="https://github.com/dd86k/lateterm">lateterm Theme</a></div>