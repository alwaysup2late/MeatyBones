<?php
/**
 * Template Name: Content/Sidebar 60%/40%
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

<section class="col7">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	  <h1><?php the_title(); ?></h1>
	  <?php the_content(); ?>
	<?php endwhile; wp_reset_query(); ?>
</section>

<aside class="col5 last">
	<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>