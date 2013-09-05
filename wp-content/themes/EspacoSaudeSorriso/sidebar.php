<?php
/* ------------------------------------------------------------------------ */
/* Theme Sidebar
/* ------------------------------------------------------------------------ */
?>
<!--right-col-->

<div id="right-col" class="span3">
	<div class="sidebar">
		<?php if(is_page()){
		generated_dynamic_sidebar(); 
	} else {
		if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('main-sidebar') );
	} ?>
	</div>
</div>
<!--right-col-end--> 