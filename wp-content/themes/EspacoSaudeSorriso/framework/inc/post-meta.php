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
			<?php the_category(', '); ?>
		</li>
			<?php
				$post_tags = the_tags('<li class="meta-tag">', ' , ', '</li>');
					if ($post_tags) {
					echo '$post_tags';
					}
			?>
		<li class="meta-comments">
			<?php comments_popup_link( '0 comments', '1 Comment', ' % comments', 'comments-link', 'comments closed'); ?>
		</li>
		<li class="meta-rating">
			<?php echo sd_post_like_link(get_the_ID()); ?>
		</li>
	</ul>
</aside>
<!-- entry meta end --> 