<?php
/* ------------------------------------------------------------------------ */
/* Theme Index Content - Standard Post Format
/* ------------------------------------------------------------------------ */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry standard-entry clearfix'); ?>>
	<!-- entry content -->
	<div class="entry-content">
		<header>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink la %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
		</header>
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
			<?php the_excerpt(); ?>
		</div>
		<!-- entry excerpt end --> 
		<a class="read-more" rel="nofollow" href="<?php the_permalink() ?>#more-<?php the_ID(); ?>"><?php _e('Read More', 'framework') ?></a>
		</div>
	<!-- entry content end-->
</article>
<!--post-end--> 