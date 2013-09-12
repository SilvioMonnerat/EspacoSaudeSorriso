<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */

// Better has an underscore as last sign
$prefix = 'sd_';

global $meta_boxes;

$meta_boxes = array();

$types = get_terms('portfolio_filter', 'hide_empty=0');
$types_array[0] = 'All categories';
if($types) {
	foreach($types as $type) {
		$types_array[$type->term_id] = $type->name;
	}
} 


$meta_boxes[] = array(
	'id'      => 'page_options',
	'title'   => 'Gallery Template Options',
	'pages'   => array( 'page' ),
	'context' => 'normal',

	'fields'  => array(


		array(
			'name'    => 'Select Gallery Categories',
			'id'      => $prefix . "portfolio-taxonomies",
			'type'    => 'checkbox_list',
			// Options of checkboxes, in format 'value' => 'Label'
			'options' => $types_array,
			'desc'    => 'Optional: Choose which gallery category you want to display on this page (If Gallery Template is chosen).'
		),
	)
);

$meta_boxes[] = array(
	'id'      => 'portfolio_item',
	'title'   => 'Gallery Page Options',
	'pages'   => array( 'portfolio', 'team' ),
	'context' => 'normal',

	'fields'  => array(

		array(
			'name'	           => 'Gallery Slider Images',
			'desc'	           => 'Upload up to 20 images for the slider - or only one to display a single image. <br /><br /><strong>Note:</strong> The Preview Image will be the Image set as Featured Image.',
			'id'	           => $prefix . 'portfolio-slider',
			'type'	           => 'plupload_image',
			'max_file_uploads' => 20,
		)
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function sd_register_meta_boxes() {
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box ) {
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'sd_register_meta_boxes' );

