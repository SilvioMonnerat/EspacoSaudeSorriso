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
				<?php 
                    $title  = get_the_title();
                    $img = get_post_image_src($post->ID);
                    $default_attr = array(
                        'src'   => $src,
                        'class' => "attachment-$size",
                        'alt'   => trim(strip_tags( $attachment->post_excerpt )),
                        'title' => trim(strip_tags( $attachment->post_title )),
                    );
                    $thumb     = $thumbnail["thumb"];
					$thumbnail = get_the_post_thumbnail($post->ID);
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
			<?php the_excerpt(); ?>
		</div>
		<!-- entry excerpt end --> 
		<a class="read-more" rel="nofollow" href="<?php the_permalink() ?>#more-<?php the_ID(); ?>"><?php _e('Read More', 'framework') ?></a>
		</div>
	<!-- entry content end-->
</article>
<!--post-end--> 