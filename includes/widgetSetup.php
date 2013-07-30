<?php

/**
 * Widgets
 */
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'id' => 'top_widget',
		'name' => 'Top',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	
	register_sidebar(array(
		'id' => 'side_widget',
		'name' => 'Sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'id' => 'footer_left',
		'name' => 'FooterLeft',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));

	register_sidebar(array(
		'id' => 'footer_center',
		'name' => 'FooterCenter',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));

	register_sidebar(array(
		'id' => 'footer_right',
		'name' => 'FooterRight',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}

//Testing to see if sidebar has widgets
function is_sidebar_active($index) {
    global $wp_registered_sidebars;
    $widgetcolums = wp_get_sidebars_widgets();
    if ($widgetcolums[$index])
        return true;
    return false;
}