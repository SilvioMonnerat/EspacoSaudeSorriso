<?php

require_once('MetaBox.php');
require_once('MediaAccess.php');

// global styles for the meta boxes
if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/style.css');

//default required for m_metabox.php
//featured image is seperated to make it easier to sort the query results

$mb_team = new WPAlchemy_MetaBox(array(
	'id'       => 'team-customMeta',
	'title'    => 'Team',
	'types'    => array('team'), // added only for pages and to custom post type "events"
	'context'  => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => METAPATH . 'meta/team-meta.php'
));


/* eof */