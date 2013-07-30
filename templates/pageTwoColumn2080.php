<?php
/**
 * Template Name: Sidebar/Content 20%/80%
 */
?>

<?php get_header(); ?>

<?php
	if (has_post_thumbnail()) {
		echo '<section col12>';
			the_post_thumbnail('full');
		echo '</section>';
	}
?>

<aside class="col3">
	<?php get_sidebar(); ?>
</aside>

<section class="col9 last">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	  <h1><?php the_title(); ?></h1>
	  <?php the_content(); ?>
	<?php endwhile; wp_reset_query(); ?>
</section>

<?php get_footer(); ?>