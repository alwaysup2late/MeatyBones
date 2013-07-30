<?php

/**
 * Home Slider Custom Post Type
 */
function create_homepage_slider() {
	register_post_type('homepage_slider',
		array(
			'public' => true,
			'label' => 'Home Slides',
			'supports' => array(
				'title',
				'thumbnail',
				'excerpt'
			)
		)
	);
}
add_action('init', 'create_homepage_slider');