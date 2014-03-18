<?php
function sd_jquery_scripts() {
	global $sd_data;
	/* ------------------------------------------------------------------------ */
	/* Register jQuery Scripts */
	/* ------------------------------------------------------------------------ */
	wp_register_script('bootstrap', get_template_directory_uri() . '/framework/js/bootstrap.js', false, '', true);
	wp_register_script('preloader', get_template_directory_uri() . '/framework/js/preloader.js', false, '', true);
	wp_register_script('pretty-photo', get_template_directory_uri() . '/framework/js/prettyphoto.js', false, '', true);
	wp_register_script('superfish', get_template_directory_uri() . '/framework/js/superfish.js', false, '', true);
	wp_register_script('flexslider', get_template_directory_uri() . '/framework/js/flexslider.js', false, '', true);
	wp_register_script('isotope', get_template_directory_uri() . '/framework/js/isotope.js', false, '', true);
	wp_register_script('jqueryui', get_template_directory_uri() . '/framework/js/jqueryui.js', false, '', true);
	wp_register_script('jquerytools', get_template_directory_uri() . '/framework/js/jquerytools.js', false, '', true);
	wp_register_script('hoverdir', get_template_directory_uri() . '/framework/js/hoverdir.js', false, '', true);
	wp_register_script('post-rating', get_template_directory_uri() . '/framework/js/post-rating.js', false, '', true);
	wp_register_script('mobile-menu', get_template_directory_uri() . '/framework/js/mobile-menu.js', false, '', true);
	wp_register_script('jquery.selectbox', get_template_directory_uri() . '/framework/js/jquery.selectbox-0.2.js', false, '', true);
	wp_register_script('custom', get_template_directory_uri() . '/framework/js/custom.js', false, '', true);
	wp_register_script('gmap', ('http://maps.google.com/maps/api/js?sensor=false'), false, '', false );
	
	/* ------------------------------------------------------------------------ */
	/* Enqueue Scripts */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_script('jquery');
	wp_enqueue_script('gmap');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('preloader');
	wp_enqueue_script('pretty-photo');
	if ( is_page_template('gallery-page.php') ) wp_enqueue_script('isotope');
	wp_enqueue_script('superfish');
	wp_enqueue_script('flexslider');
	wp_enqueue_script('jqueryui');
	wp_enqueue_script('jquerytools');
	wp_enqueue_script('post-rating');
	wp_localize_script('post-rating', 'ajax_var', array(
	'url' => admin_url('admin-ajax.php'),
	'nonce' => wp_create_nonce('ajax-nonce')
));
	wp_enqueue_script('mobile-menu');
	wp_enqueue_script('jquery.selectbox');
	wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'sd_jquery_scripts');

function sd_css_styles() {
	global $sd_data;
	
	/* ------------------------------------------------------------------------ */
	/* Register Stylesheets */
	/* ------------------------------------------------------------------------ */
	
	wp_register_style('bootstrap', get_template_directory_uri() . '/framework/css/bootstrap.css', 'style');
	wp_register_style('shortcodes', get_template_directory_uri() . '/framework/css/shortcodes.css', 'style');
	wp_register_style('flexslider', get_template_directory_uri() . '/framework/css/flexslider.css', 'style');
	wp_register_style('prettyphoto', get_template_directory_uri() . '/framework/css/prettyPhoto.css', 'style');
	wp_register_style('custom-styles', get_stylesheet_directory_uri() . '/framework/css/custom-styles.css', 'style');
	wp_register_style('jquery.selectbox', get_stylesheet_directory_uri() . '/framework/css/jquery.selectbox.css', 'style');
	wp_register_style('responsive', get_template_directory_uri() . '/framework/css/responsive.css', 'style');

	
	/* ------------------------------------------------------------------------ */
	/* Enqueue Styles */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_style( 'bootstrap', '2');
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '3', 'all' ); // Main Stylesheet
	wp_enqueue_style( 'shortcodes');
	wp_enqueue_style( 'flexslider');
	wp_enqueue_style( 'prettyphoto');
	wp_enqueue_style( 'custom-styles');
	wp_enqueue_style( 'jquery.selectbox');
	wp_enqueue_style( 'responsive');
}
add_action( 'wp_enqueue_scripts', 'sd_css_styles', 1 ); 
?>