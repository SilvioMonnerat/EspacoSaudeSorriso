<?php 
/* ------------------------------------------------------------------------ */
/* Theme Normal Page
/* ------------------------------------------------------------------------ */
get_header(); ?>
<!--left col-->

<div class="container vertical-line" <?php if ($sd_data['blog_sidebar'] == 'left') echo 'style="background-position: 270px 0 !important;"';?>>
<div class="row">
<!--left col-->
<div id="left-col" class="span9" <?php if ($sd_data['blog_sidebar'] == 'left') echo 'style="float: right;"';?>>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry page-entry clearfix'); ?>> 
		
		<!-- entry content -->
		<div class="entry-content"> 
			<!-- entry excerpt -->
			<div class="entry-excerpt">
				<?php the_content(); ?>
				<?php wp_link_pages('before=<strong class="page-navigation clearfix">&after=</strong>'); ?>
			</div>
			<!-- entry excerpt end --> 
		</div>
		<!-- entry content end--> 
	</article>
	<!--post-end-->
	
	<?php endwhile; else: ?>
	<p>
		<?php _e('Sorry, no posts matched your criteria', 'framework') ?>
		.</p>
	<?php endif; ?>
	<!--comments-->
	<?php comments_template('', true); ?>
	<!--comments end--> 
</div>
<!--left col end--> 
<!--sidebar-->
<?php get_sidebar(); ?>
<!--sidebar end-->
</div>
</div>
<?php get_footer(); ?>