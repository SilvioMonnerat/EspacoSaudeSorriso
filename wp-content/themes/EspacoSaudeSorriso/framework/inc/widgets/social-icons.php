<?php
/*
Plugin Name: Social Icons
Plugin URI: http://www.skatdesign.com/
Description: A simple widget to display icons from your social profiles.
Version: 1.00
Author: Skat
Author URI: http://www.skatdesign.com/
*/

// The widget class
class sd_social_icons_widget extends WP_Widget {
	
	// Widget Settings
	function sd_social_icons_widget() {
	
		$widget_ops = array( 'classname' => 'sd_social_icons_widget', 'description' => __('A widget that displays icons from your social profiles.', 'framework') );
		$control_ops = "";
		$this->WP_Widget( 'sd_social_icons_widget', __('Social Icons', 'framework'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		// Before the widget
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
		echo $before_title . $title . $after_title;
		?>
		<div class="hi-icon-wrap hi-icon-effect-3 hi-icon-effect-3b">
		<ul class="social-icons-widget">
			<?php if (!empty($instance['facebook'])) : ?>
			<li class="social-facebook"><a class="hi-icon" href="<?php echo $instance['facebook']; ?>" title="<?php echo $instance['facebook']; ?>" rel="nofollow" target="_blank">Facebook</a><span></span></li>
			<?php endif; ?>
			<?php if (!empty($instance['twitter'])) : ?>
			<li class="social-twitter"><a href="<?php echo $instance['twitter']; ?>" title="<?php echo $instance['twitter']; ?>" rel="nofollow" target="_blank">Twitter</a></li>
			<?php endif; ?>
			<?php if (!empty($instance['linkedin'])) : ?>
			<li class="social-linkedin"><a href="<?php echo $instance['linkedin']; ?>" title="<?php echo $instance['linkedin']; ?>" rel="nofollow" target="_blank">LinkedIn</a></li>
			<?php endif; ?>
			<?php if (!empty($instance['googleplus'])) : ?>
			<li class="social-googleplus"><a href="<?php echo $instance['googleplus']; ?>" title="<?php echo $instance['googleplus']; ?>" rel="nofollow" target="_blank">Google Plus</a></li>
			<?php endif; ?>
			<?php if (!empty($instance['youtube'])) : ?>
			<li class="social-youtube"><a href="<?php echo $instance['youtube']; ?>" title="<?php echo $instance['youtube']; ?>" rel="nofollow" target="_blank">Youtube</a></li>
			<?php endif; ?>
			<?php if (!empty($instance['vimeo'])) : ?>
			<li class="social-vimeo"><a href="<?php echo $instance['vimeo']; ?>" title="<?php echo $instance['vimeo']; ?>" rel="nofollow" target="_blank">Vimeo</a></li>
			<?php endif; ?>
			<?php if (!empty($instance['pinterest'])) : ?>
			<li class="social-pinterest"><a href="<?php echo $instance['pinterest']; ?>" title="<?php echo $instance['pinterest']; ?>" rel="nofollow" target="_blank">Pinterest</a></li>
			<?php endif; ?>
			<?php if (!empty($instance['rss'])) : ?>
			<li class="social-rss"><a href="<?php echo $instance['rss']; ?>" title="<?php echo $instance['rss']; ?>" rel="nofollow" target="_blank">RSS</a></li>
			<?php endif; ?>
		</ul>
		</div>
		<?php 
		// After the widget
		echo $after_widget;
	}
	// Update the widget		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );

		return $instance;
	}

	// Widget panel settings
	function form( $instance ) {

	// Default widgets settings
		$defaults = array(
		'title' => 'Get Social',
		'facebook' => 'https://www.facebook.com/skatdesign',
		'twitter' => 'https://twitter.com/skatdesign',
		'linkedin' => 'http://www.linkedin.com/in/skatdesign',
		'googleplus' => 'https://plus.google.com/u/0/b/116008836048520090738/116008836048520090738/posts',
		'youtube' => 'https://www.youtube.com/zabestof',
		'vimeo' => '#',
		'pinterest' => 'http://pinterest.com/skatdesign',
		'rss' => 'http://feeds.feedburner.com/skatdesign'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Facebook: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" />
		</p>
		<!-- Twitter: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" />
		</p>
		<!-- LinkedIn: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('LinkedIn Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" />
		</p>
		<!-- Google Plus: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Google Plus Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" />
		</p>
		<!-- Youtube: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" />
		</p>
		<!-- Vimeo: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" />
		</p>
		<!-- Pinterest: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" />
		</p>
		<!-- RSS: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('RSS Url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" />
		</p>


	<?php
	}
}
// Register and load the widget
function sd_social_icons_widget() {
	register_widget( 'sd_social_icons_widget' );
}
add_action( 'widgets_init', 'sd_social_icons_widget' );
?>