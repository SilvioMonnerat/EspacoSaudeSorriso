<?php
/*
Plugin Name: Nossa Equipe Widget
Plugin URI: http://www.skatdesign.com/
Description: A simple widget to display the popular posts.
Version: 1.00
Author: Skat
Author URI: http://www.skatdesign.com/
*/

// The widget class
class sd_nossa_equipe_widget extends WP_Widget {
	
	// Widget Settings
	function sd_nossa_equipe_widget() {
	
		$widget_ops = array( 'classname' => 'sd_nossa_equipe_widget', 'description' => __('A widget to display the popular posts.', 'framework') );
		$control_ops = "";
		$this->WP_Widget( 'sd_nossa_equipe_widget', __('Nossa equipe', 'framework'), $widget_ops, $control_ops );
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
		
		// Display the Feedburner subscribe form
		?>

		<?php 
			$equipe = new WP_Query( array( 'post_type' => 'team', 'showposts' => $instance['postcount'] ));
		?>
		<?php while ($equipe->have_posts()) : $equipe->the_post(); ?>
		<?php 
			global $mb_team;
			$mb_team->the_meta($p->ID);
			$meta = $mb_team->meta;
		?>
			<div id="equipe" class="one-half last">
				<div class="member-box">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
					<?php $img = get_post_image_src($post->ID); ?>
						<a href="<?php the_permalink() ?>">
							<figure> <?php the_crop_image($img, '&amp;w=90&amp;h=60&amp;zc=1'); ?> </figure>
						</a>
					<?php endif; ?>
					<div class="member-details">
						<a href="<?php the_permalink() ?>">
							<h3><?php echo $meta['name']  ?></h3>						
						</a>						
					</div>
				</div>
			</div>
		<?php endwhile; wp_reset_query(); ?>		
		
<?php 
		// After the widget
		echo $after_widget;
	}
	// Update the widget		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );

		return $instance;
	}

	// Widget panel settings
	function form( $instance ) {

	// Default widgets settings
		$defaults = array(
		'title' => __('Nossa Equipe', 'framework'),
		'postcount' => '6'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e('Title:', 'framework') ?>
	</label>
	<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<!-- Post Count: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'postcount' ); ?>">
		<?php _e('Post Count', 'framework') ?>
	</label>
	<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
</p>
<?php
	}
}
// Register and load the widget
function sd_nossa_equipe_widget() {
	register_widget( 'sd_nossa_equipe_widget' );
}
add_action( 'widgets_init', 'sd_nossa_equipe_widget' );
?>
