<?php
/**
 * Template Name: Content/Sidebar 50%/50%
 */
?>

<?php get_header(); ?>

<section class="col6">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	  <h1><?php the_title(); ?></h1>
	  <?php the_content(); ?>
	<?php endwhile; wp_reset_query(); ?>
</section>

<aside class="col6 last">
	<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>