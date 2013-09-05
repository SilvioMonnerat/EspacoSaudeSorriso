<?php 
/* ------------------------------------------------------------------------ */
/* TinyMce Editor Custom Shortcode Buttons
/* ------------------------------------------------------------------------ */


function myplugin_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "add_myplugin_tinymce_plugin");
     add_filter('mce_buttons', 'register_myplugin_button');
   }
}
 
function register_myplugin_button($buttons) {
   array_push($buttons, "separator", 'divider', 'columns', 'button', 'styles_typography','framed_box', 'gmap', 'tabs', 'accordions', 'toggle', 'chart', 'testimonial', 'pricing_table', 'contact_form', 'video_shortcode');
   return $buttons;
}

function icons_path() {
	$icons_path = '<script type="text/javascript">
	var iconsPath = "'.get_template_directory_uri().'/framework/inc/tinymce/images/" ;
	</script>';
	echo $icons_path;
}
 
add_filter('admin_head', 'icons_path');
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_myplugin_tinymce_plugin($plugin_array) {
	// this plugin file will work the magic of our button

   $plugin_array['columns'] = get_template_directory_uri() . '/framework/inc/tinymce/tinymce_plugin.js';
   return $plugin_array;
}
 
// init process for button control
add_action('init', 'myplugin_addbuttons');

?>