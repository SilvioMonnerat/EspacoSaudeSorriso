<?php 

	function wp_contact_admin() {
	    add_options_page("WP Contact Admin", "WP Contact Admin", 1, "wp_contact_slug", "build_page_setup");
	
	} add_action('admin_menu', 'wp_contact_admin');

	function build_page_setup(){ ?>
		<?php global $options; ?>

		<h2><?php  _e( 'Settings php mailer', 'wp_contact' )?> </h2>
		
		<form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>

			<label for="smtp_host"><?php _e( 'HOST', 'wp_contact' ) ?></label><br />
			<input type="text" name="smtp_host" class="smtp_host" id="smtp_host" size="80" value="<?php echo $smtp_host ?>" /><br />

			<label for="smtp_port"><?php _e( 'PORT', 'wp_contact' ) ?></label><br />
			<input type="text" name="smtp_port" class="smtp_port" id="smtp_port" size="80" value="<?php echo $smtp_port ?>" /><br />

			<label for="smtp_user"><?php _e( 'USERNAME', 'wp_contact' ) ?></label><br />
			<input type="text" name="smtp_user" class="smtp_user" id="smtp_user" size="80" value="<?php echo $smtp_user ?>" /><br />

			<label for="smtp_pass"><?php _e( 'PASSWORD', 'wp_contact' ) ?></label><br />
			<input type="text" name="smtp_pass" class="smtp_pass" id="smtp_pass" size="80" value="<?php echo $smtp_pass ?>" /><br /><br />

        	<input type="submit" name="submit" class="button-primary" id="submit_options_form" valeu="<?php _e('Save All Changes', 'wp_contact') ?>" />
        	<input type="hidden" name="record" value="update" />

        </form>

        <br /><hr />

        <h2><?php  _e( 'Contacts registered on the site', 'wp_contact' )?> </h2>
	<?php 
		global $wpdb;
		$rows = $wpdb->get_results("select * from wp_contact");
		echo "<ul>";
			foreach ($rows as $obj) :
				echo "<li>".$obj->name."</li>";
				echo "<li>".$obj->email."</li>";
				echo "<li>".$obj->subject."</li>";
				echo "<li>".$obj->message."</li>";
				echo "<li>".$obj->data."</li>";			
				echo "<li>".$obj->ip."</li>";
			endforeach;
		echo "</ul>";
	}	