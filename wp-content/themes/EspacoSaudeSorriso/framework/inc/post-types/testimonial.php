<?php
/* ----------------------------------------------------- */
/* Team Custom Post Type */
/* ----------------------------------------------------- */

function register_testimonial() {  

	global $sd_data;
	
	$labels = array(
		'name'               => __( 'Testimonial', 'framework' ),
		'singular_name'      => __( 'Testimonial Item', 'framework' ),
		'add_new'            => __( 'Add New Item', 'framework' ),
		'add_new_item'       => __( 'Add New Testimonial Item', 'framework' ),
		'edit_item'          => __( 'Edit Testimonial Item', 'framework' ),
		'new_item'           => __( 'Add New Testimonial Item', 'framework' ),
		'view_item'          => __( 'View Item', 'framework' ),
		'search_items'       => __( 'Search Testimonial', 'framework' ),
		'not_found'          => __( 'No gallery items found', 'framework' ),
		'not_found_in_trash' => __( 'No gallery items found in trash', 'framework' )
	);
	
    $testimonial_args = array(  
        'labels'          => $labels,
        'public'          => true,
        'show_ui'         => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'rewrite'         => array('slug' => $sd_data['testimonial_slug']), // Permalinks format
        'supports'        => array('title', 'editor', 'thumbnail')
       );  
  
    register_post_type( 'testimonial' , $testimonial_args );  
}  

// Team taxonomy
register_taxonomy(
	"testimonial_filter", 
	array("testimonial"),
	array(
		"hierarchical"   => true,
		"label"          => "Testimonial Filter",
		"singular_label" => "Testimonial Filter",
		"rewrite"        => true
		)
	);

// Adds Custom Post Type
add_action('init', 'register_testimonial'); 

//Add Columns to Team Edit Screen
//http://wptheming.com/2010/07/column-edit-pages/
 
function testimonial_edit_column( $testimonial_columns ) {
	$testimonial_columns = array(
		"cb"                 => "<input type=\"checkbox\" />",
		"title"              => __('Title', 'framework'),
		"thumbnail"          => __('Thumbnail', 'testimonialposttype'),
		"testimonial_filter" => __('Filter', 'testimonialposttype'),
		"author"             => __('Author', 'testimonialposttype'),
		"comments"           => __('Comments', 'testimonialposttype'),
		"date"               => __('Date', 'testimonialposttype'),
	);
	$testimonial_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $testimonial_columns;
}

add_filter( 'manage_edit-testimonial_columns', 'testimonial_edit_column' );

function testimonial_column_display( $testimonial_columns, $post_id ) {

	// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview
	
	switch ( $testimonial_columns ) {
		
		// Display the thumbnail in the column view
		case "thumbnail":
			$width = (int) 35;
			$height = (int) 35;
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
			
			// Display the featured image in the column view if possible
			if ( $thumbnail_id ) {
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			}
			if ( isset( $thumb ) ) {
				echo $thumb;
			} else {
				echo __('None', 'testimonialposttype');
			}
			break;	
			
		// Display the team tags in the column view
		case "testimonial_filter":
		
		if ( $category_list = get_the_term_list( $post_id, 'testimonial_filter', '', ', ', '' ) ) {
			echo $category_list;
		} else {
			echo __('None', 'testimonialposttype');
		}
		break;			
	}
}

add_action( 'manage_posts_custom_column', 'testimonial_column_display', 10, 2 );

// Adds taxonomy filters to the team admin page */
// Code from http://pippinsplugins.com */

 
function testimonial_add_taxonomy_filters() {
	global $typenow;
	
	// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array( 'testimonial_filter' );
 
	// must set this to the post type you want the filter(s) displayed on
	if ( $typenow == 'testimonial' ) {
 
		foreach ( $taxonomies as $tax_slug ) {
			$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
			$tax_obj = get_taxonomy( $tax_slug );
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if ( count( $terms ) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>$tax_name</option>";
				foreach ( $terms as $term ) {
					echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}
}

add_action( 'restrict_manage_posts', 'testimonial_add_taxonomy_filters' ); 

//Team icon
function testimonial_icon() { ?>
	<style type="text/css" media="screen">
#menu-posts-team .wp-menu-image {
 background: url(<?php echo get_template_directory_uri();
?>/framework/images/team-icon.png) no-repeat 6px -17px !important;
}
#menu-posts-team:hover .wp-menu-image, #menu-posts-team.wp-has-current-submenu .wp-menu-image {
	background-position: 6px 7px!important;
}
#icon-edit.icon32-posts-team {
 background: url(<?php echo get_template_directory_uri();
?>/framework/images/team-icon-large.png) no-repeat;
}
</style>
	<?php } 

add_action( 'admin_head', 'testimonial_icon' );
?>