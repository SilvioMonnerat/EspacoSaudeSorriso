<?php
/* ------------------------------------------------------------------------ */
/* Template Name: Page: Testimonial
/* ------------------------------------------------------------------------ */
?>
<?php get_header(); ?>

	<div class="container vertical-line" <?php if ($sd_data['blog_sidebar'] == 'left') echo 'style="background-position: 270px 0 !important;"';?>>
		<div class="row">
			<!--left col-->
			<div id="left-col" class="span9" <?php if ($sd_data['blog_sidebar'] == 'left') echo 'style="float: right;"';?>>
				<?php 
					global $wp_query;
					$args  = array(
						'post_type' => 'testimonial',
						'order'     => 'DESC', 
						'showposts' => '10', 
						'order'     => 'DESC'
						);
					
					$wp_query = new WP_Query($args);
					
					if ($wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry standard-entry clearfix'); ?>>
					<!-- entry content -->
					<div class="entry-content">

						<?php get_template_part( 'framework/inc/post-meta-testimonial'); ?>

						<div class="page-testimonial">
							<div class="testimonial-photo">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
								<?php $img = get_post_image_src($post->ID); ?>
									<figure> <?php the_crop_image($img, '&amp;w=100&amp;h=170&amp;zc=1'); ?> </figure>
								<?php endif; ?>
							</div>

							<div class="photo-testimonial-content">
								<p><?php the_content() ?></p>
							</div>
						</div>

					</div>
					<!-- entry content end-->
				</article>
				<!--post-end--> 

				<?php endwhile; else: ?>
				
				<p>	<?php _e('Sorry, no posts matched your criteria', 'framework') ?>.</p>
				<?php endif; ?>
				<!--pagination-->
				<?php sd_custom_pagination();  ?>
				<!--pagination end--> 
			</div>
			<!--left col end--> 
			<!--sidebar-->
			<?php get_sidebar(); ?>
			<!--sidebar end-->
		</div>
	</div>

<?php get_footer('testimonial'); ?>

