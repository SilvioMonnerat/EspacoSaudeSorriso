<?php
/* ------------------------------------------------------------------------ */
/* Template Name: Page: Gallery
/* ------------------------------------------------------------------------ */
get_header();
?>

<div class="container">
	<div class="row">
		<div class="gallery-filters span12">
			<?php
		$portfolio_filters = get_terms('portfolio_filter');
		if($portfolio_filters): ?>
			<ul>
				<li><a href="#" data-filter="*" class="active">
					<?php _e('All', 'framework'); ?>
					<span></span> </a></li>
				<?php foreach($portfolio_filters as $portfolio_filter): ?>
				<?php if(rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list')  && !in_array('0', rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list'))): ?>
				<?php if(in_array($portfolio_filter->term_id, rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list') )): ?>
				<li><a href="#" data-filter=".<?php echo $portfolio_filter->slug; ?>"><?php echo $portfolio_filter->name; ?><span></span></a></li>
				<?php endif; ?>
				<?php else: ?>
				<li><a href="#" data-filter=".<?php echo $portfolio_filter->slug; ?>"><?php echo $portfolio_filter->name; ?><span></span></a></li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		<div class="gallery-content">
			<?php
	global $wp_query;
			
	$portfolio_items = $sd_data['portfolio_items']; // Get Items per Page Value
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
				'post_type' 		=> 'portfolio',
				'posts_per_page' 	=> $portfolio_items,
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'paged' 			=> $paged
			);
			
	// Only pull from selected taxonomy
	$selected_taxonomies = rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list');

		if($selected_taxonomies && $selected_taxonomies[0] == 0) {
			unset($selected_taxonomies[0]);
			}
		
		if($selected_taxonomies){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'portfolio_filter',
				'field' 	=> 'ID',
				'terms' 	=> $selected_taxonomies
			);
		}

		$wp_query = new WP_Query($args);
			
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<?php $taxonomies = get_the_terms( get_the_ID(), 'portfolio_filter' ); ?>
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
						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></h3>
						<!-- <p><?php //echo get_the_term_list( get_the_ID(), 'portfolio_filter', '', ', ' ); ?></p> -->
						<a href="<?php the_permalink() ?>"><div class="read"><span></span></div></a>
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
