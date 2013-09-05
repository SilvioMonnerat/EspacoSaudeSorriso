<?php
/* ------------------------------------------------------------------------ */
/* Theme Single Post - Standard Post Format
/* ------------------------------------------------------------------------ */
global $sd_data;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry single-blog-entry clearfix'); ?>>
	<!-- entry content -->
	<div class="entry-content">
		<?php get_template_part( 'framework/inc/post-meta'); ?>
		<!-- post thumbnail -->
		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
		<div class="entry-thumb">
			<figure>
				<?php if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) { the_post_thumbnail('responsive-blog'); } else { the_post_thumbnail('blog-thumbs'); } ?>
			</figure>
		</div>
		<?php endif; ?>
		<!-- post thumbnail end--> 
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