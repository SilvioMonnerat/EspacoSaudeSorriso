<?php

// the shortcode
function wp_contact_form($atts) {
	
	global $options, $post;
	$settings = get_option( 'options', $options );

	extract(shortcode_atts(array(
		"table_name"    => 'wp_contact',
		"emailTo"       => get_option('admin_email'),
		"subjectEmail"  => '',
		"date"          => date('d/m/Y'),
		"user_ip"       => get_the_ip(),
  		"label_name"    => __('Name', 'wp_contact'),
		"label_email"   => __('E-mail','wp_contact'),
		"label_subject" => __('Subject', 'wp_contact'),
		"label_message" => __('Message', 'wp_contact'),
		"label_submit"  => __('Submit', 'wp_contact'),
		"success"       => __('Thanks for your e-mail! We\'ll get back to you as soon as we can.', 'wp_contact'),
		"username"      => $settings['smtp_user'],//'contato@espacosaudesorriso.com',
		"password"      => $settings['smtp_pass'], //'ocapse4102',
		"host"          => $settings['smtp_host'], //'smtp.espacosaudesorriso.com',
		"port"          => $settings['smtp_port'], //'587',
		"nameError"     => __( 'Please enter your name.', 'wp_contact' ),
		"emailError"    => __( 'Please enter your email address.', 'wp_contact' ),
		"emailInvalid"  => __( 'You entered an invalid email address.', 'wp_contact' ),
		"subjectError"  => __( 'Please enter your subject.', 'wp_contact' ),
		"commentError"  => __( 'Please enter a message.', 'wp_contact' )
	), $atts));

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sent			 = false;
		$error           = false;
		$required_fields = array("your_name", "your_email", "your_subject", "your_message");		
		$date            = date('d/m/Y');
		$ip              = get_the_ip();

		foreach ($required_fields as $required_field) {
			$value = trim($form_data[$required_field]);
			if(empty($value)) {
				$error = true;
				$result = $error_empty;
			}
		}

		if(!is_email($form_data['your_email'])) {
			$error  = true;
			$result = $error_noemail;
		}

		if ($error == false) {
			smtp_php_mailer($emailTo, $form_data['your_name'], $form_data['your_email'], $form_data['your_subject'], $form_data['your_message'], $date, $ip, $host, $port, $username, $password);
			
			$result = $success;
			$sent   = true;

			insert_data_db('wp_contact', $form_data['your_name'], $form_data['your_email'], $form_data['your_subject'], $form_data['your_message'], $date, $ip);	
		}
	}


	if($result != "") {
		$info = '<div class="info">'.$result.'</div>';
	}
	if(isset($errorFail)) {
		$info = '<div class="info">'.$errorFail.'</div>';
	}
	$form = '
		<form class="contact-form wpcf7-form" method="post" action="'.get_permalink().'">
			<div>
				<input type="text" name="your_name" id="cf_name" size="50" maxlength="50"placeholder="'.$label_name.'" />
			</div>
			<div>
				<input type="text" name="your_email" id="cf_email" size="50" maxlength="50" placeholder="'.$label_email.'" />
			</div>
			<div>
				<input type="text" name="your_subject" id="cf_subject" size="50" maxlength="50" placeholder="'.$label_subject.'" />
			</div>
			<div>
				<textarea name="your_message" id="cf_message" cols="40" rows="10" placeholder="'.$label_message.'"></textarea>
			</div>
			<div>
				<input type="submit" value="'.$label_submit.'" name="send" id="cf_send" />
			</div>
		</form>
	';
	
	if($sent == true) {
		return $info;
	} else {
		return $info.$form;
	}
	
} 

add_shortcode('contact', 'wp_contact_form');

?>