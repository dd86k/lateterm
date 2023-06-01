<?php get_header(); the_post(); ?>
<header>
<h1><?php the_title(); ?></h1>
<div>Author: <?php the_author(); ?></div>
<div>Published: <?php the_time(get_option('date_format')); ?></div>
<?php
$u_time          = get_the_time( 'U' );
$u_modified_time = get_the_modified_time( 'U' );
// Only display modified date if 24hrs have passed since the post was published.
if ( $u_modified_time >= $u_time + 86400 ) {
 
    $updated_date = get_the_modified_date();
    $updated_time = get_the_modified_time();
    
    echo('<div>Last modified: '.$updated_date.' at '.$updated_time.'</div>');
}
?>
<div>Categories: <?php the_category(); ?></div>
</header>
<div><?php the_content(); ?></div>
<div class="singlenav">
  <div>
  <?php
    $prev = get_previous_post_link('%link');
    if ($prev) { echo('<span class="prev">'.$prev.'</span>'); }
    $next = get_next_post_link('%link');
    if ($next) { echo('<span class="next">'.$next.'</span>'); }
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