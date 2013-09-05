<?php
/* ------------------------------------------------------------------------ */
/* Related Gallery
/* ------------------------------------------------------------------------ */
global $sd_data;
?>
<div class="related-gallery clearfix">
		<?php
		if ( 'portfolio' == get_post_type() ) {
			$taxs = wp_get_post_terms( $post->ID, 'portfolio_filter' );
			
			if ( $taxs ) {
				$tax_ids = array();
				
				foreach( $taxs as $individual_tax ) $tax_ids[] = $individual_tax->term_id;
					$args = array(
						'tax_query' => array(
						array(
							'taxonomy'  => 'portfolio_filter',
							'terms'     => $tax_ids,
							'operator'  => 'IN'
						)
					),
					'post__not_in'          => array( $post->ID ),
					'posts_per_page'        => 4,
					'ignore_sticky_posts'   => 1
					);
         
		$my_query = new wp_query( $args );
		
		if( $my_query->have_posts() ) : ?>
		<h3 class="styled-title"><?php echo sd_half_title( __('Related Images', 'framework') ); ?><span class="title-arrow"></span></h3>
		<div class="row">
			<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
		<div class="span3">
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
					<p><?php echo get_the_term_list( get_the_ID(), 'portfolio_filter', '', ', ' ); ?></p>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		</div>
				<?php endif;
        wp_reset_query();
         
			}
		}
	?>
</div>
