<?php
/*
Plugin Name: Opening Hours
Plugin URI: http://www.skatdesign.com/
Description: A simple widget to display your business's opening hours.
Version: 1.00
Author: Skat
Author URI: http://www.skatdesign.com/
*/

// The widget class
class sd_opening_hours_widget extends WP_Widget {
	
	// Widget Settings
	function sd_opening_hours_widget() {
	
		$widget_ops = array( 'classname' => 'sd_opening_hours_widget', 'description' => __('A widget that displays your business\'s opening hours.', 'framework') );
		$control_ops = "";
		$this->WP_Widget( 'sd_opening_hours_widget', __('Opening Hours', 'framework'), $widget_ops, $control_ops );
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
		
		<ul class="opening-hours">
			<?php if (!empty($instance['monday'])) : ?>
			<li><?php _e('Segunda-Feira', 'framework'); ?><span class="opening-hour"><?php echo $instance['monday']; ?></span></li>
			<?php endif; ?>
			<?php if (!empty($instance['tuesday'])) : ?>
			<li><?php _e('Tuesday', 'framework'); ?><span class="opening-hour"><?php echo $instance['tuesday']; ?></span></li>
			<?php endif; ?>
			<?php if (!empty($instance['wednesday'])) : ?>
			<li><?php _e('Wednesday', 'framework'); ?><span class="opening-hour"><?php echo $instance['wednesday']; ?></span></li>
			<?php endif; ?>
			<?php if (!empty($instance['thursday'])) : ?>
			<li><?php _e('Thursday', 'framework'); ?><span class="opening-hour"><?php echo $instance['thursday']; ?></span></li>
			<?php endif; ?>
			<?php if (!empty($instance['friday'])) : ?>
			<li><?php _e('Friday', 'framework'); ?><span class="opening-hour"><?php echo $instance['friday']; ?></span></li>
			<?php endif; ?>
			<?php if (!empty($instance['saturday'])) : ?>
			<li><?php _e('Saturday', 'framework'); ?><span class="opening-hour"><?php echo $instance['saturday']; ?></span></li>
			<?php endif; ?>
			<?php if (!empty($instance['sunday'])) : ?>
			<li><?php _e('Sunday', 'framework'); ?><span class="opening-hour"><?php echo $instance['sunday']; ?></span></li>
			<?php endif; ?>
		</ul>
		
		<?php 
		// After the widget
		echo $after_widget;
	}
	// Update the widget		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['monday'] = strip_tags( $new_instance['monday'] );
		$instance['tuesday'] = strip_tags( $new_instance['tuesday'] );
		$instance['wednesday'] = strip_tags( $new_instance['wednesday'] );
		$instance['thursday'] = strip_tags( $new_instance['thursday'] );
		$instance['friday'] = strip_tags( $new_instance['friday'] );
		$instance['saturday'] = strip_tags( $new_instance['saturday'] );
		$instance['sunday'] = strip_tags( $new_instance['sunday'] );

		return $instance;
	}

	// Widget panel settings
	function form( $instance ) {

	// Default widgets settings
		$defaults = array(
		'title' => 'Opening Hours',
		'monday' => '8:00 AM - 4:00 PM',
		'tuesday' => '8:00 AM - 4:00 PM',
		'wednesday' => '8:00 AM - 4:00 PM',
		'thursday' => '8:00 AM - 4:00 PM',
		'friday' => '8:00 AM - 4:00 PM',
		'saturday' => '9:00 AM - 3:00 PM',
		'sunday' => 'closed',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Monday: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'monday' ); ?>"><?php _e('Monday', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'monday' ); ?>" name="<?php echo $this->get_field_name( 'monday' ); ?>" value="<?php echo $instance['monday']; ?>" />
		</p>
		<!-- Tuesday: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tuesday' ); ?>"><?php _e('Tuesday', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'tuesday' ); ?>" name="<?php echo $this->get_field_name( 'tuesday' ); ?>" value="<?php echo $instance['tuesday']; ?>" />
		</p>
		<!-- Wednesday: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'wednesday' ); ?>"><?php _e('Wednesday', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'wednesday' ); ?>" name="<?php echo $this->get_field_name( 'wednesday' ); ?>" value="<?php echo $instance['wednesday']; ?>" />
		</p>
		<!-- Thursday: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'thursday' ); ?>"><?php _e('Thursday', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'thursday' ); ?>" name="<?php echo $this->get_field_name( 'thursday' ); ?>" value="<?php echo $instance['thursday']; ?>" />
		</p>
		<!-- Friday: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'friday' ); ?>"><?php _e('Friday', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'friday' ); ?>" name="<?php echo $this->get_field_name( 'friday' ); ?>" value="<?php echo $instance['friday']; ?>" />
		</p>
		<!-- Saturday: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'saturday' ); ?>"><?php _e('Saturday', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'saturday' ); ?>" name="<?php echo $this->get_field_name( 'saturday' ); ?>" value="<?php echo $instance['saturday']; ?>" />
		</p>
		<!-- Sunday: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'sunday' ); ?>"><?php _e('Sunday', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'sunday' ); ?>" name="<?php echo $this->get_field_name( 'sunday' ); ?>" value="<?php echo $instance['sunday']; ?>" />
		</p>


	<?php
	}
}
// Register and load the widget
function sd_opening_hours_widget() {
	register_widget( 'sd_opening_hours_widget' );
}
add_action( 'widgets_init', 'sd_opening_hours_widget' );
?>