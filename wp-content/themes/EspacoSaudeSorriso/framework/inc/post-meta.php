<?php
/* ------------------------------------------------------------------------ */
/* Post Meta
/* ------------------------------------------------------------------------ */
?>
<!-- entry meta -->

<aside class="entry-meta clearfix">
	<ul>
		<li class="meta-author">
			<?php the_author(); ?>
		</li>
		<li class="meta-date">
			<?php the_time(get_option('date_format')); ?>
		</li>
		<li class="meta-category">
			<?php //the_category(', '); ?>
		</li>
			<?php
				$post_tags = the_tags('<li class="meta-tag">', ' , ', '</li>');
					if ($post_tags) {
						echo '$post_tags';
					}
			?>
		<li class="meta-comments">
			<?php //comments_popup_link( '0 comments', '1 Comment', ' % comments', 'comments-link', 'comments closed'); ?>
			<a href="<?php the_permalink() ?>" class="twitter-share-button" width="" data-lang="pt" data-dnt="true">Tweetar</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</li>
		<li class="meta-rating">
			<?php //echo sd_post_like_link(get_the_ID()); ?>
			<div class="fb-like" data-href="<?php the_permalink() ?>" data-width="80" data-layout="button_count" data-show-faces="true" data-send="false"></div>
		</li>
	</ul>
</aside>
<!-- entry meta end --> 