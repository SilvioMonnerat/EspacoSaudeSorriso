<?php get_header(); ?>

	<div class="container vertical-line" <?php if ($sd_data['blog_sidebar'] == 'left') echo 'style="background-position: 270px 0 !important;"';?>>
		<div class="row">
			<!--left col-->
			<div id="left-col" class="span9" <?php if ($sd_data['blog_sidebar'] == 'left') echo 'style="float: right;"';?>>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry standard-entry clearfix'); ?>>
					<!-- entry content -->
					<div class="entry-content">

						<?php get_template_part( 'framework/inc/post-meta'); ?>

						<div class="entry-thumb">
							<?php $img = get_post_image_src($post->ID); ?>
							<figure> <?php the_crop_image($img, '&amp;w=225&amp;h=300&amp;zc=1'); ?> </figure>
							<h3><?php the_title() ?></h3>
						</div>

						<div class="entry-excerpt">
							<?php the_content(); ?>
							<?php wp_link_pages('before=<strong class="page-navigation clearfix">&after=</strong>'); ?>
						</div>

					</div>
					<!-- entry content end-->
				</article>
				<!--post-end--> 

				<?php endwhile; else: ?>
				<p>
					<?php _e('Sorry, no posts matched your criteria', 'framework') ?>
					.</p>
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