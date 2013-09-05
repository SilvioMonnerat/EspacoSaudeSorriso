<?php
/* ------------------------------------------------------------------------ */
/* Theme Single Post
/* ------------------------------------------------------------------------ */
get_header(); ?>
<!--left col-->

<div class="container vertical-line">
<div class="row">
<!--left col-->
<div id="left-col" class="span9" <?php if ($sd_data['blog_sidebar'] == 'left') echo 'style="float: right;"';?>>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php get_template_part( 'framework/inc/post-formats/single', get_post_format() ); ?>
	<?php endwhile; else: ?>
	<p>
		<?php _e('Sorry, no posts matched your criteria', 'framework') ?>
		.</p>
	<?php endif; ?>
	<!--comments-->
	<?php comments_template('', true); ?>
	<!--comments end--> 
</div>
<!--left col end--> 
<!--sidebar-->
<?php get_sidebar(); ?>
</div>
</div>
<!--sidebar end-->
<?php get_footer(); ?>