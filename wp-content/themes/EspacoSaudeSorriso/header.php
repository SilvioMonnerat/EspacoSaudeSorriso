<?php
/* ------------------------------------------------------------------------ */
/* Theme Header
/* ------------------------------------------------------------------------ */
global $sd_data;
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo get_bloginfo('name'); ?>" />
<title>
<?php if (is_front_page()) {
	echo get_bloginfo('name').' - '. get_bloginfo( 'description' );
	}
	elseif ( is_single() ) {
		the_title();
		}
		elseif (is_page()) {
			the_title(); echo ' | '; echo get_bloginfo('name');
			}
			elseif (is_category()) {
				single_cat_title(); echo ' | '; echo get_bloginfo('name');
				}
				elseif (is_month()) {
					echo 'Archive for '; echo the_time('F, Y');
					}
					elseif (is_tag()) {
						echo 'Items tagged '; echo single_tag_title();
						}
						else {
							}
?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- header -->
<header id="header" class="clearfix">
	<div class="container">
		<div class="row"> 
			<!-- blog title logo -->
			<div class="span3">
				<h1 class="site-title">
					<?php if ( $logo = $sd_data['logo'] ) { ?>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo $logo; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" /></a>
					<?php } else { ?>
					<span class="text-logo"> <a name="top" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' );	?> </a> </span>
					<?php } ?>
				</h1>
			</div>
			<!-- blog title logo end --> 
			<!-- primary menu -->
			<div class="<?php echo $header_class = ($sd_data['top_phone_email_bar'] == 1 ? 'span7' : 'span9'); ?>">
				<nav id="main-menu" class="main-menu">
					<?php
						// Using wp_nav_menu() to display menu
						wp_nav_menu( array(
							'menu'            => 'Main Menu', // Select the menu to show by Name
							'class'           => 'sf-menu',
							'menu_class'      => 'sf-menu',
							'menu_id'         => 'menu-nav',
							'before'          => '<span class="beforeItem"></span><span class="menutem">',
							'after'           => '</span><span class="afterItem"></span>',
							'container'       => false, // Remove the navigation container div
							'theme_location'  => 'Header Menu'
							)
						);
					?>
				</nav>
			</div>
			<!-- primary menu end--> 
			<?php if ( $sd_data['top_phone_email_bar'] == 1) : ?>
			<!-- tel email section --> 
			<div class="span3 tel-email">
			<ul>
			<?php if ( !empty($sd_data['top_phone']) ) : ?>
			<li><?php _e('Tel:', 'framework'); ?> <?php echo $sd_data['top_phone']; ?></li>
			<?php endif; ?>
			<?php if ( !empty($sd_data['top_email']) ) : ?>
			<li><?php _e('Email:', 'framework'); ?> <?php echo $sd_data['top_email']; ?></li>
			<?php endif; ?>
			</ul>
			</div>
		</div>
	</div>
	<div class="right-bar"> <div> <div></div> </div> </div>
	<!-- tel email section end --> 
			<?php endif; ?>
</header>
<!-- header end -->
<!-- rev slider -->
<?php if ( is_front_page() && $sd_data['home_slider'] == 1) : ?>
<?php if ( function_exists( putRevSlider( 'homeslider' )) ); ?>
<?php endif; ?>
<!-- rev slider end-->
<?php if ( is_front_page() && $sd_data['home_intro'] == 1) : ?>
<div class="intro-text clearfix">
	<div class="container">
		<div class="row">
			<div class="intro-text-content"><?php echo do_shortcode($sd_data['home_intro_content']); ?></div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php get_template_part( 'framework/inc/page-top' ); ?>