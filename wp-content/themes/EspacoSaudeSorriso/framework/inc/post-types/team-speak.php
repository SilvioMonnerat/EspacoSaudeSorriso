<?php
/* ----------------------------------------------------- */
/* Team Custom Post Type */
/* ----------------------------------------------------- */

function register_team_speak() {  

	global $sd_data;
	
	$labels = array(
		'name'               => __( 'Equipe', 'framework' ),
		'singular_name'      => __( 'Equipe Item', 'framework' ),
		'add_new'            => __( 'Add New Item', 'framework' ),
		'add_new_item'       => __( 'Add New Equipe Item', 'framework' ),
		'edit_item'          => __( 'Edit Equipe Item', 'framework' ),
		'new_item'           => __( 'Add New Equipe Item', 'framework' ),
		'view_item'          => __( 'View Item', 'framework' ),
		'search_items'       => __( 'Search Equipe', 'framework' ),
		'not_found'          => __( 'No gallery items found', 'framework' ),
		'not_found_in_trash' => __( 'No gallery items found in trash', 'framework' )
	);
	
    $team_args = array(  
        'labels'          => $labels,
        'public'          => true,
        'show_ui'         => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'rewrite'         => array('slug' => $sd_data['team_speak_slug']), // Permalinks format
        'supports'        => array('title', 'editor', 'thumbnail')
       );  
  
    register_post_type( 'team_speak' , $team_args );  
}  

// Team taxonomy
register_taxonomy(
	"team_speak_filter", 
	array("team_speak"),
	array(
		"hierarchical"   => true,
		"label"          => "Equipe Filter",
		"singular_label" => "Equipe Filter",
		"rewrite"        => true
		)
	);

// Adds Custom Post Type
add_action('init', 'register_team_speak'); 

//Add Columns to Team Edit Screen
//http://wptheming.com/2010/07/column-edit-pages/
 
function team_speak_edit_column( $team_columns ) {
	$team_columns = array(
		"cb"                => "<input type=\"checkbox\" />",
		"title"             => __('Title', 'framework'),
		"thumbnail"         => __('Thumbnail', 'team_speakposttype'),
		"team_speak_filter" => __('Filter', 'team_speakposttype'),
		"author"            => __('Author', 'team_speakposttype'),
		"comments"          => __('Comments', 'team_speakposttype'),
		"date"              => __('Date', 'team_speakposttype'),
	);
	$team_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $team_columns;
}

add_filter( 'manage_edit-team_speak_columns', 'team_speak_edit_column' );

function team_speak_column_display( $team_columns, $post_id ) {

	// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview
	
	switch ( $team_columns ) {
		
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
				echo __('None', 'team_speakposttype');
			}
			break;	
			
		// Display the team tags in the column view
		case "team_speak_filter":
		
		if ( $category_list = get_the_term_list( $post_id, 'team_speak_filter', '', ', ', '' ) ) {
			echo $category_list;
		} else {
			echo __('None', 'team_speakposttype');
		}
		break;			
	}
}

add_action( 'manage_posts_custom_column', 'team_speak_column_display', 10, 2 );

// Adds taxonomy filters to the team admin page */
// Code from http://pippinsplugins.com */

 
function team_speak_add_taxonomy_filters() {
	global $typenow;
	
	// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array( 'team_speak_filter' );
 
	// must set this to the post type you want the filter(s) displayed on
	if ( $typenow == 'team_speak' ) {
 
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

add_action( 'restrict_manage_posts', 'team_speak_add_taxonomy_filters' ); 

//Team icon
function team_speak_icon() { ?>
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

add_action( 'admin_head', 'team_speak_icon' );
?>