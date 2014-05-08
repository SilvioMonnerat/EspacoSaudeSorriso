<?php
	
	$options = array();

	function admin_menu_contact () {
		$page_title = 'Contact Options';
		$menu_title = 'Contact Options';
		$capability = 'manage_options';
		$menu_slug  = 'contact_options';
		$function   = 'build_settings_page';

		add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );

		add_action( 'admin_init', 'register_settings_contact' );

	} add_action('admin_menu', 'admin_menu_contact');

	function register_settings_contact() {
		//register our settings
		register_setting( 'settings-group', 'options' );
	}

	function build_settings_page(){
		global $options, $wpdb;
		$wpdb->contact = $wpdb->prefix.'contact';

		$sql = "
			CREATE TABLE " . $wpdb->contact . " (
				id int(11) unsigned auto_increment,
				name varchar(50) default '',
				date varchar(20) default '',
				email varchar(40) default '',
				subject varchar(150) default '',
				message varchar(500) default '',
				ip varchar(15) default '',
				PRIMARY KEY  (id) 
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";

		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		dbDelta($sql);
?>	
		<form method="post" action="options.php" id="of_form">
	        <?php 
	            settings_fields( 'settings-group' );
	            do_settings_sections( 'settings-group' );
	            $settings = get_option( 'options', $options );
	        ?>

	        <input type="submit" name="submit" class="button-primary" id="submit_options_form" value="<?php _e('Save All Changes','provon'); ?>" />
		</form>
<?php
	}