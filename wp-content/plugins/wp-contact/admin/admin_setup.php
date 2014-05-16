<?php
    // variables for the field and option names 
    $options = array(
        'smtp_host' => '',
        'smtp_port' => '',
        'smtp_user' => '',
        'smtp_pass' => ''
    );

    if ( is_admin() ) :

        function wp_create_menu_contact() {
            // Add a new top-level menu (ill-advised):
            add_menu_page(__('WP Contact Admin','wp_contact'), __('WP Contact Admin','wp_contact'), 'manage_options', 'wp_contact_slug', 'build_page_setup', PLUGIN_URL.'/images/icon-contact.png');

            // Add a submenu to the custom top-level menu:
            add_submenu_page('wp_contact_slug', __('List of registered mail','wp_contact'), __('List of registered mail','wp_contact'), 'manage_options', 'sub-page_list', 'list_email_database');

            // Add a second submenu to the custom top-level menu:
            add_submenu_page('wp_contact_slug', __('Test Sublevel 2','wp_contact'), __('Test Sublevel 2','wp_contact'), 'manage_options', 'sub-page', 'mt_sublevel_page');

            //call register settings function
            add_action( 'admin_init', 'register_mysettings' );

        } add_action('admin_menu', 'wp_create_menu_contact');

        function register_mysettings() {
            //register our settings
            register_setting( 'wp_settings_group', 'options' );
        }

        function build_page_setup() {
            global $options;

            echo "<h2>".__( 'Settings SMTP send mail', 'wp_contact' ). "</h2>";
        ?>
            
            <form method="post" action="options.php" id="of_form">
                <?php 
                    settings_fields( 'wp_settings_group' );
                    do_settings_sections( 'wp_settings_group' );
                    $settings = get_option( 'options', $options );
                ?>

                <label for="smtp_host"><?php _e( 'HOST', 'wp_contact' ) ?></label><br />
                <input type="text" name="options[smtp_host]" class="smtp_host" id="smtp_host" size="80" value="<?php echo $settings['smtp_host'] ?>" /><br />

                <label for="smtp_port"><?php _e( 'PORT', 'wp_contact' ) ?></label><br />
                <input type="text" name="options[smtp_port]" class="smtp_port" id="smtp_port" size="80" value="<?php echo $settings['smtp_port'] ?>" /><br />

                <label for="smtp_user"><?php _e( 'USERNAME', 'wp_contact' ) ?></label><br />
                <input type="text" name="options[smtp_user]" class="smtp_user" id="smtp_user" size="80" value="<?php echo $settings['smtp_user'] ?>" /><br />

                <label for="smtp_pass"><?php _e( 'PASSWORD', 'wp_contact' ) ?></label><br />
                <input type="text" name="options[smtp_pass]" class="smtp_pass" id="smtp_pass" size="80" value="<?php echo $settings['smtp_pass'] ?>" /><br /><br />

                <input type="submit" name="Submit" class="button-primary" id="submit_options_form" valeu="<?php _e('Save All Changes', 'wp_contact') ?>" />

            </form>

<?php   }

        // list_email_database() displays the page content for the first submenu of the custom Test Toplevel menu
        function list_email_database() { 
            echo "<h2>".__( 'Contacts registered on the site', 'wp_contact' ). "</h2>";
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

        // mt_sublevel_page2() displays the page content for the second submenu
        // of the custom Test Toplevel menu
        function mt_sublevel_page2() {
            echo "<h2>" . __( 'Test Sublevel2', 'menu-test' ) . "</h2>";
        }
    endif;