<?php
	
	/* 
		Template Name: Template: Contact
	*/
?>

<?php get_header();?>

	<div class="container content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('full-width-page clearfix'); ?>> 
			
			<!-- entry content -->
			<div class="entry-content">
				<div class="container">

					<div class="one-sixth">
						<div class="center">
							<p>
								<a href="mailto:contato@espacosaudesorriso.com" target="_blank">
									<img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/email-icon.png" rel="PrettyPhoto[18]">
								</a>
							</p>
							<h3><?php _e( 'Email', 'framework' ) ?></h3><p><?php _e( 'contato@espacosaudesorriso.com', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p><img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/phone-icon.png"></p>
							<h3><?php _e( 'Telefone', 'framework' ) ?></h3><p><?php _e( '+ 55 21 3062-2007 ', 'framework' ) ?></p><p><?php _e( '+ 55 21 2611-3138 ', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p><img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/address-icon.png"></p>
							<h3><?php _e( 'Endereço', 'framework' ) ?></h3><p><?php _e( 'Rua Otávio Carneiro nº 100 – sala 807 – Icaraí – Niterói – Rj', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p>
								<a href="http://espacosaudesorriso.com">
									<img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/website-icon.png" rel="PrettyPhoto[18]">
								</a>
							</p>
							<h3><?php _e( 'Website', 'framework' ) ?></h3><p><?php _e( 'http://espacosaudesorriso.com', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p>
								<a href="http://www.facebook.com" target="_blank">
									<img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/fb-icon.png" rel="PrettyPhoto[18]">
								</a>
							</p>
							<h3><?php _e( 'Facebook', 'framework' ) ?></h3><p><?php _e( 'Fans', 'framework' ) ?></p>
						</div>
					</div>


					<div style="padding-bottom: 30px; margin-top: 15px;" class="space-divider"></div>

					<div class="one-half">
						<h2 class="styled-title"><?php _e( 'PREENCHA O', 'framework' ) ?> <span class="custom-word"> <?php _e( 'FORMULÁRIO', 'framework' ) ?></span><span class="title-arrow"></span></h2>

						<?php echo do_shortcode( '[contact]' )  ?>

					</div>

					<div class="one-half last">
						<h2 class="styled-title"><?php _e( 'NOSSA', 'framework' ) ?><span class="custom-word"> <?php _e( 'CLÍNICA', 'framework' ) ?></span><span class="title-arrow"></span></h2>
						<?php the_content() ?> 
					</div>
					<div class="clearfix"></div></div>
			</div>
			<!-- entry content end--> 
		</article>
		<!--post-end-->
		
		<?php endwhile; else: ?>

			<p>	<?php _e('Sorry, no posts matched your criteria', 'framework') ?>. </p>

		<?php endif; ?>
</div>
<!-- content end -->
<?php get_footer(); ?>
