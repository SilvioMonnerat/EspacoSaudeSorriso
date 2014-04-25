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
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
					$args  = array(
						'post_type'   => 'testimonial',
						'order'       => 'DESC',
						'paged'       => $paged
						);
					
					$wp_query = new WP_Query($args);
					
					if ($wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry standard-entry clearfix'); ?>>
					<!-- entry content -->
					<div class="entry-content">

						<?php get_template_part( 'framework/inc/post-meta'); ?>

						<h3><?php the_title() ?></h3>

						<!-- post thumbnail -->
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<div class="entry-thumb">
							<figure>
								<?php 
				                    $img = get_post_image_src($post->ID);
								?>
								<?php 
									if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) { 
										//the_post_thumbnail('responsive-blog'); 
										the_crop_image($img, '&amp;w=458&amp;h=254&amp;zc=1');
									} else { 
										//the_post_thumbnail('blog-thumbs');
										the_crop_image($img, '&amp;w=870&amp;h=290&amp;zc=1');
									} 
								?>
							</figure>
						</div>
						<?php endif; ?>
						<!-- post thumbnail end-->


						<div class="entry-excerpt">
							<p><?php echo substr(get_the_excerpt(), 0, 150); ?>...</p>
						</div>

						<a class="read-more" rel="nofollow" href="<?php the_permalink() ?>#more-<?php the_ID(); ?>"><?php _e('Read More', 'framework') ?></a>

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

