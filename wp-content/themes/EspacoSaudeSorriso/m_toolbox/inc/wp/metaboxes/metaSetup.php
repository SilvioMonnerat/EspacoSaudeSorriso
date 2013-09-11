<?php

require_once('MetaBox.php');
require_once('MediaAccess.php');

// global styles for the meta boxes
if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/library/css/metaboxes.css');

//default required for m_metabox.php
//featured image is seperated to make it easier to sort the query results
$mb_destaque = new WPAlchemy_MetaBox(array
(
	'id'       => 'destaque-customMeta',
	'title'    => 'Destaque',
	'types'    => array('denuncia', 'post', 'projeto'), // added only for pages and to custom post type "events"
	'context'  => 'side', // defaults to "normal"
	'priority' => 'high', // defaults to "high"
	'template' => METAPATH . 'meta/destaque-meta.php'
));
$mb_gmap = new WPAlchemy_MetaBox(array
(
	'id'       => 'gmap-customMeta',
	'title'    => 'Google Map',
	'types'    => array('denuncia', 'post', 'projeto'), // added only for pages and to custom post type "events"
	'context'  => 'normal', // defaults to "normal"
	'priority' => 'high', // defaults to "high"
	'template' => METAPATH . 'meta/gmap-meta.php'
));
$mb_problema = new WPAlchemy_MetaBox(array
(
	'id'       => 'denuncia-customMeta',
	'title'    => 'Denuncia',
	'types'    => array('denuncia'), // added only for pages and to custom post type "events"
	'context'  => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => METAPATH . 'meta/denuncia-meta.php'
)); 

$mb_projeto = new WPAlchemy_MetaBox(array
(
	'id'       => 'projeto-customMeta',
	'title'    => 'Projeto',
	'types'    => array('projeto'), // added only for pages and to custom post type "events"
	'context'  => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => METAPATH . 'meta/projeto-meta.php'
));

$mb_work = new WPAlchemy_MetaBox(array
(
	'id'       => 'work-customMeta',
	'title'    => 'Works',
	'types'    => array('work'), // added only for pages and to custom post type "events"
	'context'  => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => METAPATH . 'meta/work-meta.php'
));

/* eof */