<?php
/* ------------------------------------------------------------------------ */
/* Theme Single Portfolio
/* ------------------------------------------------------------------------ */
get_header();
?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('full-width-page clearfix'); ?>> 
		
		<!-- entry content -->
		<div class="entry-content">
		<?php get_template_part( 'framework/inc/gallery/team' ); ?>
		</div>
		<!-- entry content end--> 
	</article>
	<!--post-end-->
	
	<?php endwhile; else: ?>
	<p>
		<?php _e('Sorry, no posts matched your criteria', 'framework') ?>
		.</p>
	<?php endif; ?>
	<?php //if ( $sd_data['related_gallery'] == 1 ) : ?>
	<?php //get_template_part( 'framework/inc/gallery/related-team' ); ?>
	<?php //endif; ?>
</div>
<?php get_footer(); ?>