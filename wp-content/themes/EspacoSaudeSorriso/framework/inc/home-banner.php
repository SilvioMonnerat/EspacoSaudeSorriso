<?php
/* ------------------------------------------------------------------------ */
/* Homepage Banner
/* ------------------------------------------------------------------------ */
global $sd_data;
?>

<div class="home-banner">
	<div class="container">
		<div class="home-banner-content clearfix">
			<img src="<?php echo $sd_data['home_banner_image']; ?>" alt="" title="" />
			<h3><?php echo $sd_data['home_banner_title']; ?></h3>
			<p><?php echo $sd_data['home_banner_text']; ?></p>
			<div class="center"> <a class="banner-button" href="<?php echo $sd_data['home_banner_button_url']; ?>" title=""><?php echo $sd_data['home_banner_button']; ?></a> </div>
		</div>
	</div>
</div>
