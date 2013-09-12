<?php
/* ------------------------------------------------------------------------ */
/* Single Team
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
		<?php 
			global $mb_team;
			$mb_team->the_meta($p->ID);
			$meta = $mb_team->meta;
		?>
		<div class="team-title"> <?php echo $meta['name'] ?> </div>
		<?php the_content(); ?>
		<div class="team-email"><address> <a href="mailto:<?php echo $meta['email'] ?>" target="_blank">Enviar um email</a> </address></div>
	</div>
</div>