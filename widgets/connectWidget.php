<?php
/**
 * Plugin Name: Connect Widget
 * Description: A widget that displays social icons and links.
 * Version: 1.0
 * Author: Jonathan Davis
 * Author URI: http://www.varioinc.com/
 */

class Connect_Widget extends WP_Widget {
	function My_Widget() {
		$widget_ops = array(
			'classname' => 'connect',
			'description' => __('A widget that displays the authors name ', 'connect')
		);
		
		$control_ops = array(
			'width' => 300, 
			'height' => 350,
			'id_base' => 'connect-widget'
		);
		
		$this -> WP_Widget('connect-widget', __('Connect Widget', 'connect'), $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if ($title) {
			echo $before_title . $title . $after_title;			
		}

		echo '<ul>';
		
		if (get_option('mb_facebook_link')!="") {
			echo '<li><a href="';
			echo get_option('mb_facebook_link');
			echo '" class="facebook" target="_blank">Facebook</a></li>';
		}

		if (get_option('mb_twitter_user')!="") {
			echo '<li><a href="http://www.twitter.com/';
			echo get_option('mb_twitter_user');
			echo '" class="twitter" target="_blank">Twitter</a></li>';
		}

		if (get_option('mb_linkedin_link')!="") {
			echo '<li><a href="';
			echo get_option('mb_linkedin_link');
			echo '" class="linkedin" target="_blank">LinkedIn</a></li>';
		}


		echo '<li><a href="';
		echo bloginfo('rss2_url');
		echo '" title="RSS" class="rss">RSS</a></li>';

		echo '</ul>';

		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance) {
		//Set up some default widget settings.
		$defaults = array(
			'title' => __(
				'connect',
				'connect'
			)
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', 'connect'); ?></label>
			<input id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>This widget will display the social links that are configurable under the <a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=functions.php">Theme Options</a> page.</p>
	<?php }
}

function register_connect_widget() {
	register_widget('Connect_Widget');
}

add_action('widgets_init', 'register_connect_widget');