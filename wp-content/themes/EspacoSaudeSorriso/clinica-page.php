<?php
/* ------------------------------------------------------------------------ */
/* Template Name: Page: A Clínica
/* ------------------------------------------------------------------------ */
get_header();
?>

<div class="container content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('full-width-page clearfix'); ?>>
			
			<!-- entry content -->
			<div class="entry-content">
				<div class="gallery-page">
					<div class="flexslider">
						<ul class="slides">
							<?php
						     $slides = rwmb_meta( 'sd_portfolio-slider', 'type=image&size=gallery-clinica' );
						    if ( !empty( $slides ) ) {
						    	foreach ( $slides as $slide ) { ?>
						    		
						    		<li><a href='<?php echo  $slide['full_url'] ?>' rel='prettyPhoto[slides]' class='prettyPhoto'><figure><?php the_crop_image($slide['url'], '&amp;w=1170&amp;h=550&amp;zc=1');  ?></figure></a></li>

						    	<?php }
						    } ?>
						</ul>
					</div>
				</div>
				<?php the_content(); ?>
			</div>
			<!-- entry content end--> 
		</article>
		<!--post-end-->
		
		<?php endwhile; else: ?>
		<p>
			<?php _e('Sorry, no posts matched your criteria', 'framework') ?>
			.</p>
		<?php endif; ?>
</div>
<!-- content end -->
<?php get_footer(); ?>
