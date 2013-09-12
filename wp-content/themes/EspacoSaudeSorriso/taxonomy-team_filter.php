<?php
/* ------------------------------------------------------------------------ */
/* Team Taxonomy
/* ------------------------------------------------------------------------ */

get_header();
?>

<div class="container">
	<div class="row">
		<div class="gallery-content taxonomy-gallery-filter clearfix">
			<?php while(have_posts()): the_post(); ?>
			<div class="<?php if($taxonomies) : foreach ($taxonomies as $taxonomy) { echo $taxonomy->slug. ' '; } endif; ?> gallery-item span3">
				<div class="gallery-item-content">
					<figure>
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<?php the_post_thumbnail('gallery-columns'); ?>
						<div class="thumb-overlay">
							<div class="thumb-overlay-content"> <span class="link-icon"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php _e('view', 'framework'); ?>
								</a></span>
								<?php 
									$image_id = get_post_thumbnail_id();  
									$full_image_url = wp_get_attachment_image_src($image_id,'full');  
									$full_image_url = $full_image_url[0];
								?>
								<span class="image-icon"><a rel="lightbox" title="<?php the_title(); ?>" href="<?php echo $full_image_url; ?> ">
								<?php _e('view photo', 'framework'); ?>
								</a></span> </div>
						</div>
					</figure>
					<?php endif; ?>
					<div class="gallery-details">
						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
							</a></h3>
						<p><?php echo get_the_term_list( get_the_ID(), 'team_filter', '', '<br> ' ); ?></p>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			
			<!--pagination-->
			<?php sd_custom_pagination();  ?>
			<!--pagination end--> 
		</div>
	</div>
</div>
<?php get_footer(); ?>
