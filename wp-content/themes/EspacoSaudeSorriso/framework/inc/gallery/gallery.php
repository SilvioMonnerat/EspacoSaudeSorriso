<?php
/* ------------------------------------------------------------------------ */
/* Single Gallery
/* ------------------------------------------------------------------------ */
?>

<div class="gallery-single-page">
	<div class="flexslider">
		<ul class="slides">
			<?php
		    $slides = rwmb_meta( 'sd_portfolio-slider', 'type=image&size=gallery-single' );
		    if ( !empty( $slides ) ) {
		    	foreach ( $slides as $slide ) {
		    		echo "<li><a href='". $slide['full_url'] . "' rel='prettyPhoto[slides]' class='prettyPhoto'><figure><img src='". $slide['url'] . "' /></figure></a></li>";
		    	}
		    } ?>
		</ul>
	</div>
	<div class="gallery-single-content">
		<?php the_content(); ?>
	</div>
</div>
