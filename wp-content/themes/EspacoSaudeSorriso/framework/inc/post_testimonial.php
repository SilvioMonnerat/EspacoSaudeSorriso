<?php global $sd_data  ?>
<div class="container"> 
	<?php echo do_shortcode($sd_data['bottom_custom']); ?> 
  
	<div class="scrollable" style="">
		
		<div class="items">
			<?php 
				$testimonial = new WP_query( array( 'post_type' => 'testimonial', 'showposts' => '10', 'order' => 'DESC' ) );
				if($testimonial->have_posts()): while($testimonial->have_posts()): $testimonial->the_post();
			?>

				<div class="photo-testimonial">
					<div class="testimonial-photo">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<?php $img = get_post_image_src($post->ID); ?>
							<a href="<?php the_permalink() ?>">
								<figure> <?php the_crop_image($img, '&amp;w=60&amp;h=60&amp;zc=1'); ?> </figure>
							</a>
						<?php endif; ?>
						<h5><?php the_title() ?></h5>
					</div>
					<div class="photo-testimonial-content">
						<p><?php echo substr(get_the_excerpt(), 0, 150); ?>...</p>
					</div>
				</div>
				

			<?php endwhile; endif; wp_reset_query() ?> 
		</div>
		
	</div> 

</div>
<!-- 
[one_half]
[photo_testimonial name="Rosa Maria" img="http://192.168.0.217/EspacoSaudeSorriso/wp-content/uploads/2013/09/rosamaria.jpg"]
Presentear os pacientes com um novo e belo sorriso é o que impulsiona o desenvolvimento da ortodontia. No centro de excelência em estética dental...
[/photo_testimonial]
[/one_half]

[one_half_last]
[photo_testimonial name="Joaquim Neto" img="http://192.168.0.217/EspacoSaudeSorriso/wp-content/uploads/2013/09/joaquimneto.jpg"]
Creating the perfect body is no small matter. Not being contenthe perfect body is no small matter. Not being content with  perfectbody is no small matter....
[/photo_testimonial]
[/one_half_last] -->