<?php
/* ------------------------------------------------------------------------ */
/* Template Name: Page: Team
/* ------------------------------------------------------------------------ */
get_header();
?>

<div class="container">
	<div class="row">
		<div class="team-filters span12" style="">
			<?php
				$team_filters = get_terms('team_filter');
				if($team_filters): 
			?>
			<ul>
				<li><a href="#" data-filter="*" class="active">
					<?php _e('Todos', 'framework'); ?>
					<span></span> </a></li>
				<?php foreach($team_filters as $portfolio_filter): ?>
				<?php if(rwmb_meta('sd_team-taxonomies', 'type=checkbox_list')  && !in_array('0', rwmb_meta('sd_team-taxonomies', 'type=checkbox_list'))): ?>
				<?php if(in_array($team_filter->term_id, rwmb_meta('sd_team-taxonomies', 'type=checkbox_list') )): ?>
				<li><a href="#" data-filter=".<?php echo $team_filter->slug; ?>"><?php echo $team_filter->name; ?><span></span></a></li>
				<?php endif; ?>
				<?php else: ?>
				<li><a href="#" data-filter=".<?php echo $team_filter->slug; ?>"><?php echo $team_filter->name; ?><span></span></a></li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		<div class="team-content">
			<?php
	global $wp_query;
			
	$team_items = $sd_data['team_items']; // Get Items per Page Value
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
				'post_type' 		=> 'team',
				'posts_per_page' 	=> $team_items,
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'paged' 			=> $paged,
				'posts_per_page'    => 10,
				'showposts'         => 10,
			);
			
	// Only pull from selected taxonomy
	$selected_taxonomies = rwmb_meta('sd_team-taxonomies', 'type=checkbox_list');

		if($selected_taxonomies && $selected_taxonomies[0] == 0) {
			unset($selected_taxonomies[0]);
			}
		
		if($selected_taxonomies){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'team_filter',
				'field' 	=> 'ID',
				'terms' 	=> $selected_taxonomies
			);
		}

		$wp_query = new WP_Query($args);
			
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<?php 
				$taxonomies = get_the_terms( get_the_ID(), 'team_filter' ); 
				global $mb_team;
				$mb_team->the_meta($p->ID);
				$meta = $mb_team->meta;

				$thumb  = '';
				$width  = 250;
				$height = 190;
				$title  = get_the_title();
				$img    = get_post_image_src($post->ID);
				$default_attr = array(
					'src'   => $src,
					'class' => "attachment-$size",
					'alt'   => trim(strip_tags( $attachment->post_excerpt )),
					'title' => trim(strip_tags( $attachment->post_title )),
				);
				$thumbnail = get_the_post_thumbnail($width,$height);
				$thumb = $thumbnail["thumb"];
			?>
			<div class="<?php if($taxonomies) : foreach ($taxonomies as $taxonomy) { echo $taxonomy->slug. ' '; } endif; ?> gallery-item span3">

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					
					<div class="gallery-item-content">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<figure>
							<?php the_crop_image($img, "&amp;w=$width&amp;h=$height&amp;zc=1");	?>
								<div class="thumb-overlay-team">
									<div class="thumb-overlay-content"> 
										<!--<span class="link-icon">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php _e('view', 'framework'); ?>
											</a>
										</span>
										<?php 
											$image_id       = get_post_thumbnail_id();  
											$full_image_url = wp_get_attachment_image_src($image_id,'full');  
											$full_image_url = $full_image_url[0];
										?>
										 <span class="image-icon">
											<a rel="lightbox" title="<?php the_title(); ?>" href="<?php echo $full_image_url; ?> ">
												<?php _e('view photo', 'framework'); ?>
											</a>
										</span> -->
									</div>
								</div>
						</figure>
						<?php endif; ?>
						<div class="gallery-details">
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?>	</a></h3>
							<p class="cro"><span>CRO: </span><?php echo $meta['cro'] ?></p>
							<span class="desc"><?php echo get_custom_length($meta['descricao'], 160) ?></span>
							<p class="term-filter"> <?php echo get_the_term_list( get_the_ID(), 'team_filter', '', '<br> ' ); ?> </p>
						</div>
					</div>

				</a>
			</div>
			<?php endwhile; ?>
			
			<!--pagination-->
			<?php sd_custom_pagination();  ?>
			<!--pagination end--> 
			
		</div>
	</div>
</div>
<?php get_footer(); ?>
