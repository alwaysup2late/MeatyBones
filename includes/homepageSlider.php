<?php

/**
 * Home Slider Custom Post Type
 */
function create_homepage_slider() {
	register_post_type('homepage_slider',
		array(
			'public' => true,
			'label' => 'Home Slides',
			'labels' => array(
				'name' => 'Home Slides',
				'singular_name' => 'Slide',
				'add_new' => 'Add New Slide',
				'add_new_item' => 'Add New Slide',
				'edit_item' => 'Edit Slide',
				'new_item' => 'Add New Slide',
				'view_item' => 'View Slide',
				'search_items' => 'Search Slide',
				'not_found' => 'No Slides found',
				'not_found_in_trash' => 'No slides found in trash'
			),
			'supports' => array(
				'title',
				'thumbnail',
				'excerpt'
			)
		)
	);
}
add_action('init', 'create_homepage_slider');