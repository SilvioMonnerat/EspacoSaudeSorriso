<?php
/*
Plugin Name: 110x110 Ad Blocks
Plugin URI: http://www.skatdesign.com/
Description: A simple widget to display 8 110x110 ad blocks.
Version: 1.00
Author: Skat
Author URI: http://www.skatdesign.com/
*/

// The widget class
class sd_ads_widget extends WP_Widget {
	
	// Widget Settings
	function sd_ads_widget() {
	
		$widget_ops = array( 'classname' => 'sd_ads_widget', 'description' => __('A widget that displays 8 110x110 ad blocks.', 'framework') );
		$control_ops = "";
		$this->WP_Widget( 'sd_ads_widget', __('110x110 Ad Blocks', 'framework'), $widget_ops, $control_ops );
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
		
		//Randomize ads order in a new array
		$ads = array();
			
		// Display a containing div
		echo '<div class="ads">';
		echo '<ul>';

		// Display Ad 1
		if ( $instance['ad1'] )
			$ads[] = '<li><a href="' . $instance['link1'] . '"><img src="' . $instance['ad1'] . '" width="110" height="110" alt="" /></a></li>';
		
		// Display Ad 2
		if ( $instance['ad2'] )
			$ads[] = '<li><a href="' . $instance['link2'] . '"><img src="' . $instance['ad2'] . '" width="110" height="110" alt="" /></a></li>';
			
		// Display Ad 3
		if ( $instance['ad3'] )
			$ads[] = '<li><a href="' . $instance['link3'] . '"><img src="' . $instance['ad3'] . '" width="110" height="110" alt="" /></a></li>';
			
		// Display Ad 4
		if ( $instance['ad4'] )
			$ads[] = '<li><a href="' . $instance['link4'] . '"><img src="' . $instance['ad4'] . '" width="110" height="110" alt="" /></a></li>';
			
		// Display Ad 5
		if ( $instance['ad5'] )
			$ads[] = '<li><a href="' . $instance['link5'] . '"><img src="' . $instance['ad5'] . '" width="110" height="110" alt="" /></a></li>';
			
		// Display Ad 6
		if ( $instance['ad6'] )
			$ads[] = '<li><a href="' . $instance['link6'] . '"><img src="' . $instance['ad6'] . '" width="110" height="110" alt="" /></a></li>';
		
		// Display Ad 7
		if ( $instance['ad7'] )
			$ads[] = '<li><a href="' . $instance['link7'] . '"><img src="' . $instance['ad7'] . '" width="110" height="110" alt="" /></a></li>';
			
		// Display Ad 8
		if ( $instance['ad8'] )
			$ads[] = '<li><a href="' . $instance['link8'] . '"><img src="' . $instance['ad8'] . '" width="110" height="110" alt="" /></a></li>';
			
		
		//Randomize order.
		if ($instance['random']){
			shuffle($ads);
		}
		
		//Display ads.
		foreach($ads as $ad){
			echo $ad;
		}
		
		echo '</ul>';
		echo '</div>';
		
		// After the widget
		echo $after_widget;
	}
	// Update the widget		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ad1'] = $new_instance['ad1'];
		$instance['ad2'] = $new_instance['ad2'];
		$instance['ad3'] = $new_instance['ad3'];
		$instance['ad4'] = $new_instance['ad4'];
		$instance['ad5'] = $new_instance['ad5'];
		$instance['ad6'] = $new_instance['ad6'];
		$instance['ad7'] = $new_instance['ad7'];
		$instance['ad8'] = $new_instance['ad8'];
		$instance['link1'] = $new_instance['link1'];
		$instance['link2'] = $new_instance['link2'];
		$instance['link3'] = $new_instance['link3'];
		$instance['link4'] = $new_instance['link4'];
		$instance['link5'] = $new_instance['link5'];
		$instance['link6'] = $new_instance['link6'];
		$instance['link7'] = $new_instance['link7'];
		$instance['link8'] = $new_instance['link8'];
		$instance['random'] = $new_instance['random'];

		return $instance;
	}

	// Widget panel settings
	function form( $instance ) {

	// Default widgets settings
		$defaults = array(
		'title' => 'Sponsored By',
		'ad1' => get_template_directory_uri()."/framework/images/110x110.jpg",
		'link1' => 'http://www.skatdesign.com',
		'ad2' => get_template_directory_uri()."/framework/images/110x110.jpg",
		'link2' => 'http://www.skatdesign.com',
		'ad3' => '',
		'link3' => '',
		'ad4' => '',
		'link4' => '',
		'ad5' => '',
		'link5' => '',
		'ad6' => '',
		'link6' => '',
		'ad7' => '',
		'link7' => '',
		'ad8' => '',
		'link8' => '',
		'random' => false
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Ad 1 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad1' ); ?>"><?php _e('Ad 1 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad1' ); ?>" name="<?php echo $this->get_field_name( 'ad1' ); ?>" value="<?php echo $instance['ad1']; ?>" />
		</p>
		
		<!-- Ad 1 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e('Ad 1 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" value="<?php echo $instance['link1']; ?>" />
		</p>
		
		<!-- Ad 2 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad2' ); ?>"><?php _e('Ad 2 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad2' ); ?>" name="<?php echo $this->get_field_name( 'ad2' ); ?>" value="<?php echo $instance['ad2']; ?>" />
		</p>
		
		<!-- Ad 2 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e('Ad 2 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php echo $instance['link2']; ?>" />
		</p>
		
		<!-- Ad 3 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad3' ); ?>"><?php _e('Ad 3 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad3' ); ?>" name="<?php echo $this->get_field_name( 'ad3' ); ?>" value="<?php echo $instance['ad3']; ?>" />
		</p>
		
		<!-- Ad 3 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e('Ad 3 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" value="<?php echo $instance['link3']; ?>" />
		</p>
		
		<!-- Ad 4 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad4' ); ?>"><?php _e('Ad 4 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad4' ); ?>" name="<?php echo $this->get_field_name( 'ad4' ); ?>" value="<?php echo $instance['ad4']; ?>" />
		</p>
		
		<!-- Ad 4 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link4' ); ?>"><?php _e('Ad 4 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link4' ); ?>" name="<?php echo $this->get_field_name( 'link4' ); ?>" value="<?php echo $instance['link4']; ?>" />
		</p>
		
		<!-- Ad 5 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad5' ); ?>"><?php _e('Ad 5 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad5' ); ?>" name="<?php echo $this->get_field_name( 'ad5' ); ?>" value="<?php echo $instance['ad5']; ?>" />
		</p>
		
		<!-- Ad 5 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link5' ); ?>"><?php _e('Ad 5 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link5' ); ?>" name="<?php echo $this->get_field_name( 'link5' ); ?>" value="<?php echo $instance['link5']; ?>" />
		</p>
		
		<!-- Ad 6 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad6' ); ?>"><?php _e('Ad 6 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad6' ); ?>" name="<?php echo $this->get_field_name( 'ad6' ); ?>" value="<?php echo $instance['ad6']; ?>" />
		</p>
		
		<!-- Ad 6 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link6' ); ?>"><?php _e('Ad 6 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link6' ); ?>" name="<?php echo $this->get_field_name( 'link6' ); ?>" value="<?php echo $instance['link6']; ?>" />
		</p>
        
        <!-- Ad 7 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad7' ); ?>"><?php _e('Ad 7 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad7' ); ?>" name="<?php echo $this->get_field_name( 'ad7' ); ?>" value="<?php echo $instance['ad7']; ?>" />
		</p>
		
		<!-- Ad 7 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link7' ); ?>"><?php _e('Ad 7 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link7' ); ?>" name="<?php echo $this->get_field_name( 'link7' ); ?>" value="<?php echo $instance['link7']; ?>" />
		</p>
        
        <!-- Ad 8 image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad8' ); ?>"><?php _e('Ad 8 image url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'ad8' ); ?>" name="<?php echo $this->get_field_name( 'ad8' ); ?>" value="<?php echo $instance['ad8']; ?>" />
		</p>
		
		<!-- Ad 8 link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link8' ); ?>"><?php _e('Ad 8 link url:', 'framework') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link8' ); ?>" name="<?php echo $this->get_field_name( 'link8' ); ?>" value="<?php echo $instance['link8']; ?>" />
		</p>
		
		<!-- Randomize order checkbox -->
		<p>
			<label for="<?php echo $this->get_field_id( 'random' ); ?>"><?php _e('Randomize ads order?', 'framework') ?></label>
			<?php if ($instance['random']){ ?>
				<input type="checkbox" id="<?php echo $this->get_field_id( 'random' ); ?>" name="<?php echo $this->get_field_name( 'random' ); ?>" checked="checked" />
			<?php } else { ?>
				<input type="checkbox" id="<?php echo $this->get_field_id( 'random' ); ?>" name="<?php echo $this->get_field_name( 'random' ); ?>"  />
			<?php } ?>
		</p>
		
	<?php
	}
}
// Register and load the widget
function sd_ads_widget() {
	register_widget( 'sd_ads_widget' );
}
add_action( 'widgets_init', 'sd_ads_widget' );
?>