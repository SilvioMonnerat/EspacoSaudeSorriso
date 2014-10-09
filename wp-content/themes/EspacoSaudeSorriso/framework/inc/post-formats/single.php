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
				<?php 
                    $title  = get_the_title();
                    $img    = get_post_image_src($post->ID);
				?>
				<?php 
					if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) { 
						//the_post_thumbnail('responsive-blog'); 
						the_crop_image($img, '&amp;w=458&amp;h=254&amp;zc=1');
					} else { 
						//the_post_thumbnail('blog-thumbs');
						the_crop_image($img, '&amp;w=870&amp;h=290&amp;zc=1');
					} 
				?>
			</figure>
		</div>
		<?php endif; ?>
		<!-- post thumbnail end--> 
		<!-- entry excerpt -->
		<div class="entry-excerpt">
			<?php the_content(); ?>
			<div class="tags">
				<?php			
				$post_tags = the_tags('<span class="meta-tag">', ' , ', '</span>');
					if ($post_tags) {
						echo '$post_tags';
					}
				?>
			</div>			
			<?php wp_link_pages('before=<strong class="page-navigation clearfix">&after=</strong>'); ?>
		</div>
		<!-- entry excerpt end --> 
		</div>
	<!-- entry content end-->
</article>
<!--post-end-->