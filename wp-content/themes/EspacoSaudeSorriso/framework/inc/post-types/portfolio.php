<?php
/* ----------------------------------------------------- */
/* Portfolio Custom Post Type */
/* ----------------------------------------------------- */

function register_portfolio() {  

	global $sd_data;
	
	$labels = array(
		'name'               => __( 'Gallery', 'framework' ),
		'singular_name'      => __( 'Gallery Item', 'framework' ),
		'add_new'            => __( 'Add New Item', 'framework' ),
		'add_new_item'       => __( 'Add New Gallery Item', 'framework' ),
		'edit_item'          => __( 'Edit Gallery Item', 'framework' ),
		'new_item'           => __( 'Add New Gallery Item', 'framework' ),
		'view_item'          => __( 'View Item', 'framework' ),
		'search_items'       => __( 'Search Gallery', 'framework' ),
		'not_found'          => __( 'No gallery items found', 'framework' ),
		'not_found_in_trash' => __( 'No gallery items found in trash', 'framework' )
	);
	
    $portfolio_args = array(  
        'labels'          => $labels,
        'public'          => true,
        'show_ui'         => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'rewrite'         => array('slug' => $sd_data['portfolio_slug']), // Permalinks format
        'supports'        => array('title', 'editor', 'thumbnail')
       );  
  
    register_post_type( 'portfolio' , $portfolio_args );  
}  

// Portfolio taxonomy
register_taxonomy(
	"portfolio_filter", 
	array("portfolio"),
	array(
		"hierarchical"   => true,
		"label"          => "Gallery Filter",
		"singular_label" => "Gallery Filter",
		"rewrite"        => true
		)
	);

// Adds Custom Post Type
add_action('init', 'register_portfolio'); 

//Add Columns to Portfolio Edit Screen
//http://wptheming.com/2010/07/column-edit-pages/
 
function portfolio_edit_columns( $portfolio_columns ) {
	$portfolio_columns = array(
		"cb"               => "<input type=\"checkbox\" />",
		"title"            => __('Title', 'framework'),
		"thumbnail"        => __('Thumbnail', 'portfolioposttype'),
		"portfolio_filter" => __('Filter', 'portfolioposttype'),
		"author"           => __('Author', 'portfolioposttype'),
		"comments"         => __('Comments', 'portfolioposttype'),
		"date"             => __('Date', 'portfolioposttype'),
	);
	$portfolio_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $portfolio_columns;
}

add_filter( 'manage_edit-portfolio_columns', 'portfolio_edit_columns' );

function portfolio_column_display( $portfolio_columns, $post_id ) {

	// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview
	
	switch ( $portfolio_columns ) {
		
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
				echo __('None', 'portfolioposttype');
			}
			break;	
			
		// Display the portfolio tags in the column view
		case "portfolio_filter":
		
		if ( $category_list = get_the_term_list( $post_id, 'portfolio_filter', '', ', ', '' ) ) {
			echo $category_list;
		} else {
			echo __('None', 'portfolioposttype');
		}
		break;			
	}
}

add_action( 'manage_posts_custom_column', 'portfolio_column_display', 10, 2 );

// Adds taxonomy filters to the portfolio admin page */
// Code from http://pippinsplugins.com */

 
function portfolio_add_taxonomy_filters() {
	global $typenow;
	
	// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array( 'portfolio_filter' );
 
	// must set this to the post type you want the filter(s) displayed on
	if ( $typenow == 'portfolio' ) {
 
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

add_action( 'restrict_manage_posts', 'portfolio_add_taxonomy_filters' ); 

//Portfolio icon
function portfolio_icon() { ?>
	<style type="text/css" media="screen">
#menu-posts-portfolio .wp-menu-image {
 background: url(<?php echo get_template_directory_uri();
?>/framework/images/portfolio-icon.png) no-repeat 6px -17px !important;
}
#menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
	background-position: 6px 7px!important;
}
#icon-edit.icon32-posts-portfolio {
 background: url(<?php echo get_template_directory_uri();
?>/framework/images/portfolio-icon-large.png) no-repeat;
}
</style>
	<?php } 

add_action( 'admin_head', 'portfolio_icon' );
?>