<?php
/* ------------------------------------------------------------------------ */
/* Homepage News and Widgets
/* ------------------------------------------------------------------------ */
global $sd_data;
?>

<div class="news-widgets">
	<div class="right-bg-wrapper" <?php if ($sd_data['home_sidebar_hide'] == 1) echo 'style="display: none;"'; ?>>
		<div class="right-bg-content">	
			<div class="right-bg"> </div>
		</div>
	</div>

	<div class="container">
	
		<div class="row"> 
			<!-- news section -->
			<div class="<?php echo ($sd_data['home_sidebar_hide'] == 1) ? 'span12' : 'span9' ?>">
				<h2>
					<?php
						echo sd_half_title($sd_data['home_news_title']);
					?>
				</h2>
				<?php
				$nr_posts = ($sd_data['home_sidebar_hide'] == 1) ? $sd_data['home_news_posts_disabled'] : $sd_data['home_news_posts'] ;
				$i = 0;
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => $nr_posts,
					'order'          => 'DESC',
					'orderby'        => 'date',
					'post_status'    => 'publish'
				);
				query_posts( $args );
				if( have_posts() ) : while ( have_posts() ) : the_post(); $i++;
				$margin_nr = ($sd_data['home_sidebar_hide'] == 1) ? 5 : 4; 
					if( $i == 1) {
						$class = 'span3 alpha';
					} else if( $i == $margin_nr) {
						$i = 0;
						$i++;
						$class = 'span3 alpha';
					} else $class = 'span3';

			?>
				<div class="<?php echo $class; ?>">
					<div class="news-item">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<a href="<?php the_permalink() ?>">
						<?php
							$img    = get_post_image_src($post->ID);
							//the_post_thumbnail('recent-blog'); 
							the_crop_image($img, '&amp;w=244&amp;h=173&amp;zc=1');
						?>
						</a>
						<?php endif; ?>
						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
							</a></h3>
						<p><?php echo substr(get_the_excerpt(), 0, 50); ?>...</p>
						<div class="news-meta clearfix"> 
							<span class="news-date"> <?php the_time(get_option('date_format')); ?></span>
							<!-- <span class="news-comments"><?php //comments_popup_link( '0', '1', '%', 'comments-link', 'c'); ?></span> -->
							<!-- <span class="news-rating"><?php //echo sd_post_like_link(get_the_ID()); ?></span> -->
							<span class="news-rating"><div class="fb-like" data-href="<?php the_permalink() ?>" data-width="80" data-layout="button_count" data-show-faces="true" data-send="false"></div></span>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_query(); endif; ?>
			</div>
			<!-- news section end --> 
			<?php if ($sd_data['home_sidebar_hide'] == 0) : ?>
			<!-- widget section -->
			<div class="span3 widgets-section">
				<?php dynamic_sidebar( 'homepage-sidebar' ); ?>
			</div>
			<!-- widget section end --> 
			<?php endif; ?>
		</div>
	</div>
</div>
