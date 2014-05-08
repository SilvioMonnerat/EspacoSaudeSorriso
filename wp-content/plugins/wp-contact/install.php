<?php
/* 
    Plugin Name: WP Contact                                                    
    Plugin URI: http://cabanacriacao.com                                            	
    Description: Shortcode: <code>[contact]</code>       
    Version: 1.0                                                                    
    Author: Silvio Monnerat                                                         
    Text Domain: wp-contact                                                         
    Domain Path: /languages/                                                        
    License: GPLv2                                                                              
                
 *      Copyright 2014 Silvio Monnerat <email: silvio at cabanacriacao.com>
 *
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 3 of the License, or
 *      (at your option) any later version.
 *
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */

$language = dirname(__FILE__) . '/languages';
load_theme_textdomain('wp_contact', $language);

function plugin_create_table() {
    global $wpdb;
    $table_name = $wpdb->contact;
    $table_name = $wpdb->prefix.'contact';

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ) {
        $sql = "
            CREATE TABLE " . $table_name . " (
                id int(11) unsigned auto_increment,
                name varchar(50) default '',
                email varchar(40) default '',
                subject varchar(150) default '',
                message varchar(500) default '',
                date varchar(20) default '',
                ip varchar(15) default '',
                PRIMARY KEY  (id) 
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";

        require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
        dbDelta($sql);
    }
}
// this hook will cause our creation function to run when the plugin is activated
register_activation_hook( __FILE__, 'plugin_create_table' );
 
require_once( dirname(__FILE__) . '/admin/admin_setup.php');
require_once( dirname(__FILE__) . '/functions.php');
require_once( dirname(__FILE__) . '/shortcode.php');