<?php
/* ------------------------------------------------------------------------ */
/* Theme Footer
/* ------------------------------------------------------------------------ */
global $sd_data 
?>
<?php if ( $sd_data['home_banner'] == 1 ) : ?>
<!-- home banner -->
<?php if ($sd_data['home_banner_sitewide'] == 0) : ?>
<?php if (is_front_page()) : get_template_part( 'framework/inc/home-banner' ); endif; ?>
<?php else : get_template_part( 'framework/inc/home-banner' ); ?>
<?php endif; ?>
<!-- home banner end -->
<?php endif; ?>
<?php if (is_front_page() && $sd_data['home_news_widgets'] == 1) : ?>
<!-- news & widgets -->
<?php get_template_part( 'framework/inc/news-widgets' ); ?>
<!-- news & widgets end -->
<?php endif; ?>

<?php if ( $sd_data['bottom_custom_section'] == 1 ) : ?>
<?php if ($sd_data['bottom_custom_sitewide'] == 0) : ?>
<?php if (is_front_page()) : ?>
<div class="bottom-custom-content clearfix">
	<div class="container"> <?php echo do_shortcode($sd_data['bottom_custom']); ?> </div>
</div>
<?php endif; else : ?>
<div class="bottom-custom-content clearfix">
	<?php get_template_part( 'framework/inc/post_testimonial' ); ?>
</div>
<?php endif; ?>
<?php endif; ?>
<?php if ( $sd_data['widgetized_footer'] == 1 ) : ?>
<!-- footer -->
<footer id="footer"> 
	<!-- footer content -->
	<div class="container"> 
		
		<!-- footer widgets -->
		<div class="footer-widgets">
			<div class="row">
				<div class="span4">
					<?php dynamic_sidebar( 'footer-left-sidebar' ); ?>
				</div>
				<div class="span4">
					<?php dynamic_sidebar( 'footer-middle-sidebar' ); ?>
				</div>
				<div class="span4">
					<?php dynamic_sidebar( 'footer-right-sidebar' ); ?>
				</div>
			</div>
		</div>
		<!-- footer widgets end --> 
	</div>
	<!-- footer content end --> 
</footer>
<!-- footer end -->
<?php endif; ?>

<!-- copyright -->
<div class="copyright clearfix">
	<div class="container">
		<div class="row">
			<div class="span4">
				<p><a href=""><div class="logo_footer"><?php _e( 'espaço saúde sorriso', 'framework' ) ?></div></a></p>
				<?php /* Replace default text if option is set */
				//if( $sd_data['copyright'] != '') : ?>
					<!-- <p><?php //echo stripslashes($sd_data['copyright']); ?></p> -->
					
				<?php //else : ?>
					<!-- <p>Copyright &copy; <?php //echo the_time('Y'); ?> - <a href="<?php //echo home_url( '/' ) ?>" title="<?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php //echo get_bloginfo( 'name' ); ?> </a> </p> -->
				<?php// endif; ?>
			</div>
			<div class="span8">
				<div class="footer-menu">
					<?php
			// Using wp_nav_menu() to display menu
			wp_nav_menu( array(
				'menu' => 'Footer', // Select the menu to show by Name
				'class' => '',
				'menu_class' =>'',
				'menu_id' => '',
				'container' => false, // Remove the navigation container div
				'theme_location' => 'Footer Menu'
				)
			);
			?>
				</div>
			</div>
		</div>
	</div>
	<!-- copyright container end --> 
</div>
<!-- copyright end -->
<?php wp_footer(); ?>
</body></html>