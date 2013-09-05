<?php
/* ------------------------------------------------------------------------ */
/* Share Icons
/* ------------------------------------------------------------------------ */
global $sd_data;
?>

<div class="share-entry clearfix">
	<h6>
		<?php _e('Sharing is caring:', 'framework'); ?>
	</h6>
	<ul>
		<?php if ( $sd_data['share_icon_facebook'] == 1 ) : ?>
		<li class="share-facebook"> <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="<?php _e( 'Facebook', 'framework' ) ?>" target="_blank">
			<?php _e( 'Facebook', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_twitter'] == 1 ) : ?>
		<li class="share-twitter"> <a href="http://twitter.com/home?status=<?php the_title(); ?>: <?php the_permalink(); ?>" title="<?php _e( 'Twitter', 'framework' ) ?>" target="_blank">
			<?php _e( 'Twitter', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_linkedin'] == 1 ) : ?>
		<li class="share-linkedin"> <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" title="<?php _e( 'LinkedIn', 'framework' ) ?>" target="_blank">
			<?php _e( 'LinkedIn', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_googleplus'] == 1 ) : ?>
		<li class="share-google"> <a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank">
			<?php _e( 'Google+', 'framework' ) ?>
			+</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_delicious'] == 1 ) : ?>
		<li class="share-delicious"> <a href="http://www.delicious.com/post?v=2&amp;url=<?php the_permalink() ?>&amp;notes=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Delicious', 'framework' ) ?>" target="_blank">
			<?php _e( 'Delicious', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_stumble'] == 1 ) : ?>
		<li class="share-stumbleupon"> <a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="StumbleUpon" target="_blank">
			<?php _e( 'StumbleUpon', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_digg'] == 1 ) : ?>
		<li class="share-digg"> <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;bodytext=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank" title="<?php _e( 'Digg', 'framework' ) ?>">
			<?php _e( 'Digg', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_reddit'] == 1 ) : ?>
		<li class="share-reddit"> <a href="http://www.reddit.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Reddit', 'framework' ) ?>" target="_blank">
			<?php _e( 'Reddit', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
		<?php if ( $sd_data['share_icon_email'] == 1 ) : ?>
		<li class="share-email"> <a href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink() ?>" title="<?php _e( 'E-Mail', 'framework' ) ?>" target="_blank">
			<?php _e( 'E-Mail', 'framework' ) ?>
			</a> </li>
		<?php endif; ?>
	</ul>
</div>