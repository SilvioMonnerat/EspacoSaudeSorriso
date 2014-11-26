<?php

class email_return_path {
  	function __construct() {
		add_action( 'phpmailer_init', array( $this, 'fix' ) );    
  	}
 
	function fix( $phpmailer ) {
	  	$phpmailer->Sender = $phpmailer->From;
	}
}
 
new email_return_path();

/* ------------------------------------------------------------------------ */
/* Localization
/* ------------------------------------------------------------------------ */
 
	$lang = get_template_directory() . '/framework/lang';
	load_theme_textdomain('framework', $lang);

/* ------------------------------------------------------------------------ */
/* Inlcudes
/* ------------------------------------------------------------------------ */

	include_once('m_toolbox/m_toolbox.php');
	include_once('framework/inc/enqueue.php'); // Enqueue JavaScripts & CSS
	include_once('framework/inc/shortcodes.php'); // Load Shortcodes
	include_once('framework/inc/post-types/portfolio.php'); // Load Portfolio Post Type
	include_once('framework/inc/post-types/team.php'); // Load Team Post Type	
	include_once('framework/inc/post-types/testimonial.php'); // Load testimonial Post Type
	include_once('framework/inc/sidebar-generator.php'); // Load Unlimited Sidebars
	include_once('framework/inc/post-rating.php'); // Load Post Rating
	include_once('framework/inc/post-rating.php'); // Load Post Rating
	
	/* Include TinyMce Shortcode Buttons */
	include_once('framework/inc/tinymce/tinymce_buttons.php');
	
	/* Include Widgets */
	get_template_part('framework/inc/widgets/widgets');
	
	/* Include SMOF Theme Options */
	require_once('admin/index.php'); // Slightly Modified Options Framework

	/* Include Meta Box Script */
	// Re-define meta box path and URL
    define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/framework/inc/metabox' ) );
    define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/framework/inc/metabox' ) );
    // Include the meta box script
    require_once RWMB_DIR . 'meta-box.php';

    // Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
    include 'framework/inc/metabox/the-meta-boxes.php';
	
	// Add editor style
	add_editor_style();
	
	/* ------------------------------------------------------------------------ */
	/* Automatic Plugin Activation */
	require_once('framework/inc/plugin-activation.php');
	
	function sd_required_plugins() {
		$plugins = array(
			array(
				'name'     				=> 'Revolution Slider', // The plugin name
				'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
            	'name'      => 'Contact Form 7',
            	'slug'      => 'contact-form-7',
            	'required'  => false,
            ),
			array(
            	'name'      => 'Ajax Event Calendar',
            	'slug'      => 'ajax-event-calendar',
            	'required'  => false,
            )
		);
	
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> 'framework',         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', 'framework' ),
				'menu_title'                       			=> __( 'Install Plugins', 'framework' ),
				'installing'                       			=> __( 'Installing Plugin: %s', 'framework' ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', 'framework' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', 'framework' ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'framework' ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'framework' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa($plugins, $config);
		
	}
	
	add_action('tgmpa_register', 'sd_required_plugins');
	
/* ------------------------------------------------------------------------ */
/* Settings
/* ------------------------------------------------------------------------ */
	
	// Add support for WP 2.9+ post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 189, 189, true ); // default Post Thumbnail dimensions
		add_image_size( 'blog-thumbs', 870, 290, true ); // blog thumbs
		add_image_size( 'responsive-blog', 458, 254, true ); // responsive thumbs
		add_image_size( 'recent-blog', 244, 173, true ); // recent blog thumbs
		add_image_size( 'gallery-columns', 250, 190, true ); // gallery thumbs
		add_image_size( 'gallery-single', 570, 320, true ); // gallery slider
		add_image_size( 'team-single', 320, 570, true ); // gallery slider team
		add_image_size( 'gallery-clinica', 1170, 550, true ); // gallery slider
		add_image_size( 'nossa-equipe', 90, 60, true ); // gallery slider
		
		add_image_size( 'slider-clinica', 1170, 550, true  ); // gallery slider
	}

	function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
				array_pop($content);
		$content = implode(" ",$content).'...';
		} else {
			$content = implode(" ",$content);
		}	
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	function title_limite($maximo) {
		$title = get_the_title();
		if ( strlen($title) > $maximo ) {
		$continua = '...';
		}
		$title = mb_substr( $title, 0, $maximo, 'UTF-8' );
		echo $title.$continua;
	}

	
	// Preloaded image path variable
	function sd_loader_var() {
	
	$out  = '<script type="text/javascript">';
	$out .= 'var jsimagepath = \''.get_template_directory_uri().'\'' ;
	$out .= '</script>';
	
	echo $out;
	}

	add_filter('wp_head', 'sd_loader_var');
	
	// Add rel PrettyPhoto to images in post
	
	function sd_rel_prettyphoto($content) {
		global $post;
		
		$pattern     = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
		$replacement = '<a$1href=$2$3.$4$5 rel="PrettyPhoto['.$post->ID.']"$6>';
		$content     = preg_replace($pattern, $replacement, $content);
	
	return $content;
	}
	
	add_filter('the_content', 'sd_rel_prettyphoto');
	
	// Define content width
	if ( ! isset( $content_width ) ) $content_width = 940;
	
	// Add feed links to header
	add_theme_support( 'automatic-feed-links' );
	
	// Add post formats WP 3.1+
	add_theme_support('post-formats', array( 'video', 'audio', 'link', 'gallery','team'));

	// Run shortcodes in widgets
	add_filter('widget_text', 'do_shortcode');
 
	// Change WP admin logo
 
	function sd_custom_login_logo() {
    	echo '<style type="text/css">
        #login{
        	padding: 0 !important;
        	font-family: "Maven Pro", sans-serif !important;
    	}
        #login h1 a { 
        	background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; 
        	background-size: cover !important;
        	height: 197px !important;
        	width: 70%;
        }
        #login #loginform p.submit input[type="submit"] {
        	background-image: url('.get_bloginfo('template_directory').'/images/bg-readmore.png) !important;
        	background-size: auto!important;
        	height: 30px !important;
			border: 0 !important;
			width: 89px !important;
			margin: 0 !important;
			color:#FFFFFF !important;
			background-color: transparent !important;			
			-webkit-box-shadow: none !important;
			border-color: transparent !important;
			-webkit-transition: background .3s linear !important;
			-moz-transition: background .3s linear !important;
			-ms-transition: background .3s linear !important;
			-o-transition: background .3s linear !important;
			transition: background .3s linear !important;
    	}
    	#login #loginform p.submit input[type="submit"]:hover{
    		background-image: url('.get_bloginfo('template_directory').'/images/bg-readmore_hover.png) !important;
   		}
    	</style>';
	}
 
	add_action('login_head', 'sd_custom_login_logo');
 
	// Theme support adding changed from 'nav-menus' to just 'menus'
	add_theme_support( 'menus' );
 
	// Function for registering wp_nav_menu() in 2 locations
	function sd_register_navmenus() {
		register_nav_menus( array(
			'Header Menu'    => __( 'Header Navigation', 'framework')
			)
		);
		
		register_nav_menus( array(
			'Footer Menu'    => __( 'Footer Navigation', 'framework')
			)
		);
	}

	add_action( 'init', 'sd_register_navmenus' );
	
	// Automatically add home link to the menu
	function sd_page_menu_args($args) {
	    $args['show_home'] = true;
    	return $args;
	}
	
	add_filter('wp_page_menu_args', 'sd_page_menu_args');
 
	// Register sidebars
 	function sd_register_sidebars() {
		register_sidebar( array(
			'name'          => __( 'Main Sidebar', 'framework' ),
			'id'            => 'main-sidebar',
			'description'   => '',
			'before_widget' => '<aside class="sidebar-widget clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '<span class="title-arrow"></span></h3>',
			) 
		);
		
		register_sidebar( array(
			'name'          => __( 'Homepage Sidebar', 'framework' ),
			'id'            => 'homepage-sidebar',
			'description'   => '',
			'before_widget' => '<aside class="homepage-sidebar clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
			) 
		);
		
		register_sidebar( array(
			'name'          => __( 'Footer Left Sidebar', 'framework' ),
			'id'            => 'footer-left-sidebar',
			'description'   => '',
			'before_widget' => '<aside class="footer-sidebar-widget clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
			) 
		);
		
		register_sidebar( array(
			'name'          => __( 'Footer Middle Sidebar', 'framework' ),
			'id'            => 'footer-middle-sidebar',
			'description'   => '',
			'before_widget' => '<aside class="footer-sidebar-widget clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
			) 
		);
		
		register_sidebar( array(
			'name'          => __( 'Footer Right Sidebar', 'framework' ),
			'id'            => 'footer-right-sidebar',
			'description'   => '',
			'before_widget' => '<aside class="footer-sidebar-widget clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
			) 
		);
	}

	add_action( 'widgets_init', 'sd_register_sidebars' );
	
	// Half title
	
	function sd_half_title($title){
   
	// Break the sentence into its component words:
	$words = explode(' ', $title);
	// Get the last word and trim any punctuation:
	$last_word = '<span class="custom-word"> '.$words[count($words) - 1].'</span>';

	$remaining_words = substr($title, 0, strrpos($title, " "));
	
	return $remaining_words . $last_word;
	}
	
	// Chamge Widget Title
	
	function sd_custom_widget_title($title){
   
	return sd_half_title($title);

	}
	
	add_filter('widget_title', 'sd_custom_widget_title', 10, 3);

	// Custom pagination
	function sd_custom_pagination($pages = '', $range = 3) {
		$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}
		
		if(1 != $pages) {
			echo "<div class=\"pagination clearfix\">";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class=\"pagi-first\" href='".get_pagenum_link(1)."'>&laquo; " . __('First', 'framework') . "</a>";
			if($paged > 1 && $showitems < $pages) echo "<a class=\"pagi-previous\" href='".get_pagenum_link($paged - 1)."'>&lsaquo; " . __('', 'framework') . "</a>";
			
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
				}
			}
		
			if ($paged < $pages && $showitems < $pages) echo "<a class=\"pagi-next\" href=\"".get_pagenum_link($paged + 1)."\">" . __('', 'framework') . " &rsaquo;</a>";
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class=\"pagi-last\" href='".get_pagenum_link($pages)."'>" . __('Last', 'framework') . " &raquo;</a>";
			echo "</div>";
		}
			
	}
 
	// Filter tag clould output so that it can be styled by CSS
	function sd_style_tag_cloud($tags) {
	    $tags = preg_replace_callback("|(class='tag-link-[0-9]+)('.*?)(style='font-size: )([0-9]+)(pt;')|",
        create_function(
            '$match',
            '$low=1; $high=5; $sz=($match[4]-8.0)/(22-8)*($high-$low)+$low; return "{$match[1]} tagsz-{$sz}{$match[2]}";'
        ),
        $tags);
    	return $tags;
	}
 
	add_action('wp_tag_cloud', 'sd_style_tag_cloud');
 
	
	// Remove width and height from featured images
	
	function sd_remove_width_height( $html ) {
		$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
		
		return $html;
	}

	add_filter( 'post_thumbnail_html', 'sd_remove_width_height', 10 );
 
	// Custom raw code output
	function sd_code_filter($content_text) {
    	$content_text = preg_replace('!(<pre.*?>)(.*?)</pre>!ise', " '$1' .  stripslashes( str_replace(array('<','>'),array('<','>'),'$2') )  . '</pre>' ", $content_text);
	    return $content_text;
    }
 
	add_filter('the_content','sd_code_filter', 1, 1);

	// Excerpt limit
	function sd_excerpt_length($length) {
		global $sd_data;
	    return $sd_data['excerpt_length'];
	}
	
	add_filter('excerpt_length', 'sd_excerpt_length');
	
	// Excerpt limit portfolio
	function sd_limit_words($string, $word_limit) {
		$words = explode(' ', $string, ($word_limit + 1));
		if(count($words) > $word_limit)  array_pop($words);
		
		return implode(' ', $words);
	}
	
	// Change excerpt ending [...] to ...
	function new_excerpt_more( $more ) {
		return "...";
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	// Custom styling of widget titles in widget panel
	function sd_custom_widgets_style() {
    	echo <<<EOF
			 <style type="text/css">
			div.widget[id*=_tweets_widget-] .widget-top, div.widget[id*=_popular_posts_widget-] .widget-top, div.widget[id*=_feedburner_widget-] .widget-top, div.widget[id*=_ads_widget-] .widget-top, div.widget[id*=_recent_comments_widget-] .widget-top, div.widget[id*=_opening_hours_widget-] .widget-top, div.widget[id*=_social_icons_widget-] .widget-top {
	color: #00adee;
	}
			</style>
EOF;
	}

	add_action('admin_print_styles-widgets.php', 'sd_custom_widgets_style');
	
	// Output custom CSS from standarized options

	function sd_custom_css() {

		$output = '';

		global $sd_data;

		$custom_css = $sd_data['custom_css'];
		
			if ($custom_css <> '') {
				$output .= $custom_css . "\n";
			}
		
		// Output styles
			if ($output <> '') {
				$output = "\n<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
			}
	}
	
	add_action('wp_head', 'sd_custom_css');
	
	// Add custom favicon
	function sd_custom_favicon() {
		global $sd_data;
		if ($sd_data['favicon'] != '') {
	        echo '<link rel="shortcut icon" href="'.  $sd_data['favicon']  .'"/>'."\n";
	    }
		else { ?>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/framework/images/favicon.ico" />
<?php }
	}

	add_action('wp_head', 'sd_custom_favicon');
	
	// Add tracking code to the footer
	function sd_tracking_code(){
		global $sd_data;
		$output = $sd_data['analytics_code'];
		if ( $output <> "" ) 
			echo stripslashes($output) . "\n";
	}
	
	add_action('wp_footer','sd_tracking_code');
	// Convert Hex Color to RGB
	// http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
	function sd_hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
	}
   $rgb = array($r, $g, $b);
   
   return implode(", ", $rgb);
	}
	// Add PrettyPhoto rel to flexslider
	function sd_prettphoto ($content) {
		$content = preg_replace("/<a/","<a rel=\"prettyPhoto[flexslider]\"",$content,1);
		return $content;
	}
	add_filter( 'wp_get_attachment_link', 'sd_prettphoto');
	
	// Add rel="nofollow" to blogroll links
	
	function sd_nofollow_blogroll( $html ) {
    	// remove existing rel attributes
	    $html = preg_replace( '/\s?rel=".*"/', '', $html );
	    // add rel="nofollow" to all links
	    $html = str_replace( '<a ', '<a rel="nofollow" ', $html );
	    return $html;
	}
	
	add_filter( 'wp_list_bookmarks', 'sd_nofollow_blogroll' );
	
	// Show number of comments in post excluding trackbacks/pings
	function sd_comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
		return $count;
		}
	}

	add_filter('get_comments_number', 'sd_comment_count', 0);
	
	// Add nofollow to reply links
	
	function sd_reply_link_nofollow( $link ) {
	global $user_ID;

	// Registration required login link is already nofollowed
	if ( get_option( 'comment_registration' ) && ! $user_ID )
		return $link;
	// Add nofollow otherwise
	else
		return str_replace( '")\'>', '")\' rel=\'nofollow\'>', $link );
	}
	
	add_filter( 'comment_reply_link', 'sd_reply_link_nofollow' );
    
	// Comments callback
	function sd_custom_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
		<div class="author-avatar"> <?php echo get_avatar($comment,$size=$args['avatar_size']); ?> </div>
		<div class="comment-text">
			<div class="author">
				<cite><?php echo get_comment_author_link(); ?></cite>
				<span class="comment-meta">| <?php echo get_comment_date( get_option('date_format') );?>
				<?php _e('at', 'framework'); ?>
				<?php echo get_comment_time( get_option('time_format') );?></span>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>
			<?php _e('You comment awaits moderation.', 'framework') ?>
			</em>
			<?php endif; ?>
			<div class="comment-meta commentmetadata"> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a>
				<?php edit_comment_link(__('(Edit)', 'framework'),'&nbsp;&nbsp;','') ?>
			</div>
			<div class="text-of-comment">
			<span class="comment-arrow">&nbsp;</span>
				<?php comment_text(); ?>
			</div>
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'framework' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
	<?php // Do not include the </li> tag.
	}
	// Trackback and pings callback
	function list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>">
	<?php comment_author_link(); ?>
	<?php } 

	 /*---------------------------------------------------------------------------------*/
    /* =  ADICIONAR LIMITE DE CARACTERES AO EXCERPT
    /*---------------------------------------------------------------------------------*/
    function theme_short_excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt) >= $limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        } 
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        return $excerpt;
    }

    /*----------------------------------------------------------------------------------*/
    /* =  ADICIONAR LIMITE DE CARACTERES AO CONTEÚDO DO SITE
    /*----------------------------------------------------------------------------------*/
    function the_content_limit($num) {
        $theContent = get_the_content();
        $output     = preg_replace('/<img[^>]+./','', $theContent);
        $output     = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
        $output     = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
        $limit      = $num+1;
        $content    = explode(' ', $output, $limit);
        array_pop($content);
        $content    = implode(" ",$content)."...";
        echo $content;
    }

    /*----------------------------------------------------------------------------------*/
    /* =  ADICIONAR LIMITE DE CARACTERES DO TÍTULO DO SITE
    /*----------------------------------------------------------------------------------*/
    function theme_title_limit($num) { 
        $limit  = $num + 1;         
        $title  = str_split(get_the_title());         
        $length = count($title);         
        if ($length >= $num) {         
            $title = array_slice( $title, 0, $num);      
            $title = implode("",$title)."...";       
            echo $title;         
        } else {         
            the_title();         
        }
         
    }