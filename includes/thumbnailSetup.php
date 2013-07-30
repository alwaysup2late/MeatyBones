<?php

/**
 * Thumbnails
 */
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 300, 200, true );

/* Get the thumb original image full url */
function get_thumb_urlfull ($postID) {
	$image_id = get_post_thumbnail_id($post);  
	$image_url = wp_get_attachment_image_src($image_id,'large');  
	$image_url = $image_url[0]; 

	return $image_url;
}