<?php
/* Plugin Name: MeatyBones Connect Widget
Plugin URI: https://github.com/alwaysup2late/MeatyBones
Description: [Enter brief description of plugin]
Version: 1.0
Author: Jonathan Davis
Author URI: http://www.alwaysup2late.com/
*/

class mb_connectWidget extends WP_Widget {
     function mb_connectWidget() {
          $widget_ops = array(
               'classname' => 'mb_connectWidget',
               'description' => 'A Widget to display social links defined in Theme Options.'
          );

          $this->WP_Widget(
               'mb_connectWidget',
               'MB Connect Widget',
               
               $widget_ops
          );
     }

     function widget($args, $instance) {
          extract($args, EXTR_SKIP);

          $title = apply_filters('widget_title', $instance['title']);
          
          echo '<div class="connectWidget">'.$before_widget;

          if ($title) {
               echo $before_title . $title . $after_title;            
          }
          
          echo '<ul>';

          if (get_option('mb_main_email') !="") {
               echo '<li><a href="mailto:';
               echo get_option('mb_main_email');
               echo '?subject=';
               echo get_option('mb_main_email_subject');
               echo'" class="email">Email</a></li>';
          }

          if (get_option('mb_facebook_link') != "") {
               echo '<li><a href="';
               echo get_option('mb_facebook_link');
               echo '" class="facebook" target="_blank">Facebook</a></li>';
          }

          if (get_option('mb_twitter_user') != "") {
               echo '<li><a href="http://www.twitter.com/';
               echo get_option('mb_twitter_user');
               echo '" class="twitter" target="_blank">Twitter</a></li>';
          }

          if (get_option('mb_linkedin_link') != "") {
               echo '<li><a href="';
               echo get_option('mb_linkedin_link');
               echo '" class="linkedin" target="_blank">LinkedIn</a></li>';
          }

          if (get_option('mb_display_rss') == "yes") {
               echo '<li><a href="';
               echo bloginfo('rss2_url');
               echo '" title="RSS" class="rss">RSS</a></li>';               
          }

          echo '</ul>';

          echo $after_widget.'</div>';
     }

     function update($new_instance, $old_instance) {
          $instance = $old_instance;

          $instance['title'] = strip_tags($new_instance['title']);

          return $instance;
     }

     function form($instance) {
          $defaults = array(
               'title' => __(
                    ''
               )
          );

          $instance = wp_parse_args( (array) $instance, $defaults ); ?>

          <p>
               <label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', 'connect'); ?> (optional)</label>
               <input id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
          </p>

          <p>This widget will display the social links that are configurable under the <a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=functions.php">Theme Options</a> page.</p>
     <?php }
}

add_action('widgets_init', create_function('','return register_widget("mb_connectWidget");'));