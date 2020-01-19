<?php
if (post_password_required())
	return; ?>
<div class="comments">
<?php
if (have_comments()) {
	if (get_comment_pages_count() > 1 && get_option('page_comments')) { ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'lateterm' ); ?></h2>
		<div class="nav-links">
			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'lateterm' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'lateterm' ) ); ?></div>
		</div>
	</nav>
	<?php } ?>

	<ul class="comment-list">
		<?php
		wp_list_comments([
			'style'      => 'ul',
			'short_ping' => true,
		]);
		?>
	</ul>

	<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'lateterm' ); ?></h2>
		<div class="nav-links">
			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'lateterm' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'lateterm' ) ); ?></div>
		</div>
	</nav>
<?php	}
}

if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) { ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lateterm' ); ?></p>
<?php }
comment_form([
	
]);
?>
</div>