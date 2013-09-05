<?php
/* ------------------------------------------------------------------------ */
/* Page Titles
/* ------------------------------------------------------------------------ */
global $sd_data;
?>
<?php if (!is_front_page()) : ?>
<!-- page top -->
<div class="page-top clearfix">
<div class="container">
	<!-- page title -->
		<?php if( is_archive() ) : ?>
		<?php if (have_posts()) : ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2>
				<?php _e('Categorized as:', 'framework'); ?>
				<?php
				echo sd_half_title( single_cat_title("", false));
				?>
			</h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2>
				<?php _e('Tagged as:', 'framework'); ?>
				<?php
				echo sd_half_title(single_tag_title("", false));
			?>
			</h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2>
				<?php _e('Archive for', 'framework'); ?>
				<span class="custom-word"><?php the_time('F jS, Y'); ?></span>
			</h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2>
				<?php _e('Archive for', 'framework'); ?>
				<span class="custom-word"><?php the_time('F, Y'); ?></span>
			</h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2>
				<?php _e('Archive for', 'framework'); ?>
				<span class="custom-word"><?php the_time('Y'); ?></span>
			</h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2>
					<?php _e('Archive', 'framework'); ?>
				</h2>
			<?php } else { ?>
				<h2>
					<?php _e('Categorized as:', 'framework'); ?>
				<?php
				echo sd_half_title( single_cat_title("", false));
			?>
				</h2>
			<?php } ?>
		<?php endif; ?>
		<?php elseif (is_search()) : ?>
			<h2>
				<?php _e('Search Results for:', 'framework'); ?>
				<?php $allsearch = &new WP_Query("s=$s&amp;showposts=-1"); $key = esc_html($s, 1); echo '"' . $key . '"'; wp_reset_query(); ?>
			</h2>
		<?php elseif (is_404()) : ?>
			<h2>
				<?php
				$sentence = __('Ooops, 404 Not Found!', 'framework');
					echo sd_half_title($sentence);
				?>
			</h2>
		<?php else : ?>
			<h2>
				<?php echo sd_half_title(get_the_title()); ?>
			</h2>
		<?php endif; ?>
	<!-- page title end -->
</div>
</div>
<!-- page top end -->
<?php endif; ?>