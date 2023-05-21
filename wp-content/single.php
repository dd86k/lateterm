<?php get_header(); the_post(); ?>
<header>
<h1><?php the_title(); ?></h1>
<?php the_time(get_option('date_format')); ?><br>
<?php the_author(); ?>
</header>
<div><?php the_content(); ?></div>
<div class="singlenav">
  <div>
  <?php
    $prev = get_previous_post_link('<- %link');
    if ($prev) { echo('<span>'.$prev.'</span>'); }
    $next = get_next_post_link('%link ->');
    if ($next) { echo('<span style="float: right;">'.$next.'</span>'); }
  ?>
  </div>
</div>
<?php
if (comments_open() || get_comments_number()) {
	comments_template();
}
get_sidebar();
get_footer(); 
?>