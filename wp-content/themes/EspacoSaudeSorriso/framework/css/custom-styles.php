<?php
/* ------------------------------------------------------------------------ */
/* Custom Theme Options Settings CSS
/* ------------------------------------------------------------------------ */
global $sd_data;
?>
#header {
	height: <?php echo $sd_data['header_height'] ?>px;
}
.site-title {
	margin-top: <?php echo $sd_data['logo_top_margin']; ?>px;
}
.main-menu {
	margin-top: <?php echo $sd_data['header_height']/2-16; ?>px;
}
.right-bar {
	top: <?php echo $sd_data['header_height']/2-22.5; ?>px;
}
.tel-email {
	margin-top: <?php echo $sd_data['header_height']/2-22.5; ?>px;
}

<?php if ($sd_data['blog_sidebar'] == 'left') : ?>
.vertical-line {
	background-position: 270px 0;
}
.sidebar {
	padding-left: 0;
	padding-right: 30px;
}
.sidebar-widget h3 {
	margin-left: 0;
	margin-right: -30px;
}
<?php endif; ?>

.tel-email, .right-bar div div, .banner-button, .read-more:hover, .accordion .current, .accordion .current span, .pricing-header, .pricing-table-button, .pricing-featured .pricing-table-button {
	background-color: <?php echo $sd_data['main_theme_color'] ?>;
}
.current-menu-item a, .sf-menu li.sfHover a, .sf-menu li a:hover, #main-menu .sf-menu li ul li a:hover, #main-menu .sf-menu li li.sfHover a, #main-menu .sf-menu li li.sfHover li a:hover, .read-more, .pagination .current, .pagination .inactive:hover, .pagination .pagi-first:hover, .pagination .pagi-last:hover, .pagination .pagi-previous:hover, .pagination .pagi-next:hover, .thumb-overlay-content, .gallery-single-page .flex-prev:hover, .gallery-single-page .flex-next:hover, #searchsubmit, .banner-button:hover, .pricing-featured .pricing-header, .pricing-featured .pricing-table-button {
	background-color: <?php echo $sd_data['second_theme_color'] ?>;
}
a:hover, .news-item h3 a:hover, .thecarousel a, #footer a:hover, .copyright a:hover, .footer-menu .current-menu-item a, .entry-title a:hover, .entry-meta ul li a:hover, .sidebar-widget a:hover, .popular-posts h4 a:hover, .comment-text cite a:hover {
	color: <?php echo $sd_data['main_theme_color'] ?>;
}
.latest-tweets li a, .gallery-filters .active, .gallery-filters a:hover {
		color: <?php echo $sd_data['second_theme_color'] ?>;
}
.accordion .current {
	border: 1px solid <?php echo $sd_data['main_theme_color'] ?>;
}
.accordion .pane {
	border-color: <?php echo $sd_data['main_theme_color'] ?>;
}
.fc-header-left, #aec-modal-container .aec-title, #aec-modal .link:hover {
	background-color: <?php echo $sd_data['main_theme_color'] ?> !important;
}
#aec-calendar .fc-event, #aec-modal .link {
	background-color: <?php echo $sd_data['second_theme_color'] ?> !important;
}
