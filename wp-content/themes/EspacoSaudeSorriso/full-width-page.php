<?php
/* ------------------------------------------------------------------------ */
/* Template Name: Page: Full Width
/* ------------------------------------------------------------------------ */
get_header();
?>

<div class="container content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('full-width-page clearfix'); ?>> 
			
			<!-- entry content -->
			<div class="entry-content">
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
