<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		$bg_att = array("scroll", "fixed");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);

		//Default RSS URL
		$default_feed = get_bloginfo('rss2_url');
		
		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();
				
/* ------------------------------------------------------------------------ */
/* Homepage
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Homepage",
					   "type" => "heading");
					   
$of_options[] = array( "name" => '',
					"desc" => "",
					"id" => "permission_box",
					"std" => "",
					"icon" => false,
					"type" => "permissions");

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "homepage_slider_title",
					"std" => "<h4>". __('Homepage Slider', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __('Enable Home Slider', 'framework'),
					"desc" => __('Check to enable the Home Slider.', 'framework'),
					"id" => "home_slider",
					"std" => 0,
					"on" => __('Enable', 'framework'),
					"off" => __('Disable', 'framework'),
					"type" => "switch");

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "homepage_intro_title",
					"std" => "<h4>" .__('Homepage Intro', 'framework'). "</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Enable Home Intro', 'framework'),
					"desc" => __('Check to enable the home intro.', 'framework'),
					"id" => "home_intro",
					"std" => 0,
					"folds" => 1,
					"on" => __('Enable', 'framework'),
					"off" => __('Disable', 'framework'),
					"type" => "switch");

$of_options[] = array( "name" => __('Intro Content', 'framework'),
					"desc" => __('Insert the intro content.', 'framework'),
					"id" => "home_intro_content",
					"std" => "",
					"fold" => 'home_intro',
					"type" => "textarea");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "homepage_banner_title",
					"std" => "<h4>". __('Homepage Banner', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Enable Home Banner', 'framework'),
					"desc" => __('Check to enable the home banner.', 'framework'),
					"id" => "home_banner",
					"std" => 0,
					"folds" => 1,
					"on" => __('Enable', 'framework'),
					"off" => __('Disable', 'framework'),
					"type" => "switch");
					
				$of_options[] = array( "name" => __('Display the banner sitewide?', 'framework'),
								"desc" => __('Check to display the banner sitewide intstead of just on the homepage.', 'framework'),
								"id" => "home_banner_sitewide",
								"std" => 0,
								"fold" => 'home_banner',
								"type" => "checkbox");
					
				$of_options[] = array( "name" => __('Image Banner', 'framework'),
								"desc" => __('Upload an image for the banner (220x220 px).', 'framework'),
								"id" => "home_banner_image",
								"fold" => 'home_banner',
								"std" => "",
								"type" => "upload");
					
				$of_options[] = array( "name" => __('Banner Title', 'framework'),
								"desc" => __('Type your banner\'s title.', 'framework'),
								"id" => "home_banner_title",
								"std" => "Duis a tortor mi ac ligula elementum diam",
								"fold" => 'home_banner',
								"type" => "text");
					
				$of_options[] = array( "name" => __('Banner Text', 'framework'),
								"desc" => __('Type your banner\'s text.', 'framework'),
								"id" => "home_banner_text",
								"std" => "Nunc vel imperdiet diam, nec eleifend sapien. Duis ac cursus ante, at dapibus tortor...",
								"fold" => 'home_banner',
								"type" => "textarea");
					
				$of_options[] = array( "name" => __('Button Text', 'framework'),
								"desc" => __('Type the button\'s text.', 'framework'),
								"id" => "home_banner_button",
								"std" => __('Click Here to Explore', 'framework'),
								"fold" => 'home_banner',
								"type" => "text");
					
				$of_options[] = array( "name" => __('Button Url', 'framework'),
								"desc" => __('Type the button\'s url.', 'framework'),
								"id" => "home_banner_button_url",
								"std" => "#",
								"fold" => 'home_banner',
								"type" => "text");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "home_news_widgets_title",
					"std" => "<h4>". __('Homepage News &amp; Widgets', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Enable News &amp; Widgets Section', 'framework'),
					"desc" => __('Check to enable the homepage news &amp; widgets section.', 'framework'),
					"id" => "home_news_widgets",
					"std" => 0,
					"folds" => 1,
					"on" => __('Enable', 'framework'),
					"off" => __('Disable', 'framework'),
					"type" => "switch");
					
				$of_options[] = array( "name" => __('News Section Title', 'framework'),
						"desc" => __('Type the news\'s section title.', 'framework'),
								"id" => "home_news_title",
								"std" => "Recent News",
								"fold" => 'home_news_widgets',
								"type" => "text");
								
				$of_options[] = array( "name" => __('Number of posts to display.', 'framework'),
								"desc" => __('Select the number of posts to be displayed.', 'framework'),
								"id" => "home_news_posts",
								"std" => "6",
								"type" => "select",
								"fold" => 'home_news_widgets',
								"mod" => "mini",
								"options" => array("3" => "3", "6" => "6", "9" => "9"));
						
						
				$of_options[] = array( "name" => __('Hide Sidebar?', 'framework'),
								"desc" => __('Check to hide the sidebar.', 'framework'),
								"id" => "home_sidebar_hide",
								"std" => 0,
								"fold" => 'home_news_widgets',
								"type" => "checkbox");
								
				$of_options[] = array( "name" => __('Number of posts to display if sidebar is disabled.', 'framework'),
								"desc" => __('Select the number of posts to be displayed if sidebar is disabled.', 'framework'),
								"id" => "home_news_posts_disabled",
								"std" => "8",
								"type" => "select",
								"fold" => 'home_news_widgets',
								"mod" => "mini",
								"options" => array("4" => "4", "8" => "8", "12" => "12"));
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "bottom_custom_content",
					"std" => "<h4>". __('Homepage Bottom Custom Content', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Enable Bottom Custom Section', 'framework'),
					"desc" => __('Check to enable the bottom custom section.', 'framework'),
					"id" => "bottom_custom_section",
					"std" => 0,
					"folds" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch");

				$of_options[] = array( "name" => __('Bottom Custom Content', 'framework'),
								"desc" => __('Insert your bottom custom content.', 'framework'),
								"id" => "bottom_custom",
								"std" => "",
								"fold" => "bottom_custom_section",
								"type" => "textarea");

				$of_options[] = array( "name" => __('Display Sitewide?', 'framework'),
								"desc" => __('Check to display the bottom custom section sitewide intstead of just on the homepage.', 'framework'),
								"id" => "bottom_custom_sitewide",
								"std" => 0,
								"fold" => 'bottom_custom_section',
								"type" => "checkbox");

/* ------------------------------------------------------------------------ */
/* Header
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Header",
					   "type" => "heading");
					   
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "header_height_title",
					"std" => "<h4>". __('Header Height', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					   
$of_options[] = array( "name" => __('Header Height', 'framework'),
                    "desc" => __('Enter the header\'s height (Default: 77).', 'framework'),
                    "id" => "header_height",
                    "std" => "77",
					"min" => "77",
					"step" => "1",
					"max" => "500",
                    "type" => "sliderui");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "logo_title",
					"std" => "<h4>". __('Logo', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Custom Logo', 'framework'),
					"desc" => __('Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png).', 'framework'),
					"id" => "logo",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => __('Logo Top Margin', 'framework'),
                    "desc" => __('Enter the logo\'s top margin (Default: 19).', 'framework'),
                    "id" => "logo_top_margin",
                    "std" => "19",
					"step" => "1",
					"min" => "0",
					"max" => "100",
                    "type" => "sliderui");
					
$of_options[] = array( "name" => __('Logo Left Margin', 'framework'),
                    "desc" => __('Enter the logo\'s left margin (Default: 0).', 'framework'),
                    "id" => "logo_left_margin",
                    "std" => "0",
					"step" => "1",
					"min" => "0",
					"max" => "100",
                    "type" => "sliderui");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "phone_email_bar_title",
					"std" => "<h4>". __('Right Top Phone &amp; Email', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Enable Right Top Phone &amp; Email', 'framework'),
					"desc" => __('Check to display the top phone &amp; email bar.', 'framework'),
					"id" => "top_phone_email_bar",
					"std" => 0,
					"folds" => 1,
					"on" => __('Show', 'framework'),
					"off" => __('Hide', 'framework'),
					"type" => "switch");
					
					$of_options[] = array( 
						"name" => __('Header Telephone Number', 'framework'),
        				"desc" => __('Enter the telephone number content (leave blank if disabled).', 'framework'),
		                "id" => "top_phone",
        				"std" => "",
						"fold" => "top_phone_email_bar",
		                "type" => "text");

					$of_options[] = array( 
						"name" => __('Header Telephone Number', 'framework'),
        				"desc" => __('Enter the telephone number content (leave blank if disabled).', 'framework'),
		                "id" => "top_phone2",
        				"std" => "",
						"fold" => "top_phone_email_bar",
		                "type" => "text");
					
					$of_options[] = array( "name" => __('Header Email Address', 'framework'),
                    				"desc" => __('Enter the email address (leave blank if disabled).', 'framework'),
					                "id" => "top_email",
					                "std" => "",
									"fold" => "top_phone_email_bar",
					                "type" => "text");

/* ------------------------------------------------------------------------ */
/* Footer
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Footer",
					   "type" => "heading");
					   
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "footer_title",
					"std" => "<h4>". __('Footer Settings', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __('Enable Widgetized Footer', 'framework'),
								"desc" => __('Check to show the Widgetized Footer.', 'framework'),
								"id" => "widgetized_footer",
								"std" => 0,
								"on" => __('Enable', 'framework'),
								"off" => __('Disable', 'framework'),
								"type" => "switch");

					
$of_options[] = array( "name" => __('Custom Copyright Text', 'framework'),
					"desc" => __('Insert your custom copyright text.', 'framework'),
					"id" => "copyright",
					"std" => "",
					"type" => "textarea");
								
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "tracking_title",
					"std" => "<h4>". __('Tracking Code', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Tracking Code', 'framework'),
					"desc" => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'framework'),
					"id" => "analytics_code",
					"std" => "",
					"type" => "textarea");        

/* ------------------------------------------------------------------------ */
/* Styling
/* ------------------------------------------------------------------------ */
					   
$of_options[] = array( "name" => "Styling",
					   "type" => "heading");
					   
$of_options[] = array( "name" =>  __('Theme\'s Primary Color', 'framework'),
					"desc" => __('Pick the main color for the theme (default: #8cc7ae).', 'framework'),
					"id" => "main_theme_color",
					"std" => "#8cc7ae",
					"type" => "color");
					
$of_options[] = array( "name" =>  __('Theme\'s Secondary Color', 'framework'),
					"desc" => __('Pick the secondary color for the theme (default: #ff4301).', 'framework'),
					"id" => "second_theme_color",
					"std" => "#ff4301",
					"type" => "color");
					   
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "fav_title",
					"std" => "<h4>". __('Favicon', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Custom Favicon', 'framework'),
					"desc" => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.', 'framework'),
					"id" => "favicon",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "custom_css_title",
					"std" => "<h4>". __('Custm CSS', 'framework') ."</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Custom CSS', 'framework'),
                    "desc" => __('Quickly add some CSS to your theme by adding it to this block.', 'framework'),
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");
				   
/* ------------------------------------------------------------------------ */
/* Portfolio
/* ------------------------------------------------------------------------ */
					   
$of_options[] = array( "name" => "Gallery",
					   "type" => "heading");
					   
$of_options[] = array( "name" => __('Gallery Page Slug', 'framework'),
                    "desc" => __('Enter your gallery page slug.', 'framework'),
                    "id" => "portfolio_slug",
                    "std" => "gallery-page",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Number of items on gallery page', 'framework'),
                    "desc" => __('Enter the number of items on the gallery page.', 'framework'),
                    "id" => "portfolio_items",
                    "std" => "12",
                    "type" => "text");

$of_options[] = array( "name" => __('Enable Related Gallery Items', 'framework'),
					"desc" => __('Enable the related gallery items.', 'framework'),
					"id" => "related_gallery",
					"std" => 0,
					"on" => __('Enable', 'framework'),
					"off" => __('Disable', 'framework'),
					"type" => "switch");

/* ------------------------------------------------------------------------ */
/* Blog
/* ------------------------------------------------------------------------ */
					   
$of_options[] = array( "name" => "Blog",
					   "type" => "heading");
					   
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( "name" => __('Sidebar Position', 'framework'),
					"desc" => __('Select the position of the sidebar (right or left).', 'framework'),
					"id" => "blog_sidebar",
					"std" => "right",
					"type" => "images",
					"options" => array(
						'right' => $url . '2cr.png',
						'left' => $url . '2cl.png',
						)
					);
					
$of_options[] = array( "name" => __('Excerpt Length', 'framework'),
                    "desc" => __('Enter the number of words you want to be displayed as excerpt. (Default: 30).', 'framework'),
                    "id" => "excerpt_length",
                    "std" => "30",
                    "type" => "text");
					
/* ------------------------------------------------------------------------ */
/* Backup Options
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => __('Backup and Restore Options', 'framework'),
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'framework'),
					);
					
$of_options[] = array( "name" => __('Transfer Theme Options Data', 'framework'),
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options', 'framework'),
					);
	}
}
?>