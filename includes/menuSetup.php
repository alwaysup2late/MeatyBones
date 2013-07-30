<?php

/**
 * Menus
 */
if (function_exists('wp_nav_menu')) {
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action('init', 'register_my_menus');
		
		function register_my_menus() {
			register_nav_menus(
				array(
					'main-menu' => __('Main Menu')
				)
			);
		}
	}
}