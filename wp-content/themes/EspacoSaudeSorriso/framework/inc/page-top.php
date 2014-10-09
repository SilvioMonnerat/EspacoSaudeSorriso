<?php
/* ------------------------------------------------------------------------ */
/* Page Titles
/* ------------------------------------------------------------------------ */
global $sd_data;
?>
<?php if (!is_front_page()) : ?>
<!-- page top -->
<div class="page-top clearfix">
<div class="container">
	<!-- page title -->
		<h2><?php wp_title( $sep = '', $display = true, $seplocation = '' ) ?></h2>
		<h2><?php //the_title() ?></h2>
	<!-- page title end -->
</div>
</div>
<!-- page top end -->
<?php endif; ?>