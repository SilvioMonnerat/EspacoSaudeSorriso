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
		"username"      => 'contato@espacosaudesorriso.com',
		"password"      => 'ocapse4102',
		"host"          => 'smtp.espacosaudesorriso.com',
		"port"          => '587',
		"nameError"     => __( 'Please enter your name.', 'wp_contact' ),
		"emailError"    => __( 'Please enter your email address.', 'wp_contact' ),
		"emailInvalid"  => __( 'You entered an invalid email address.', 'wp_contact' ),
		"subjectError"  => __( 'Please enter your subject.', 'wp_contact' ),
		"commentError"  => __( 'Please enter a message.', 'wp_contact' )
	), $atts));

	if ( isset($_POST['submitted']) ) {
		$sent			 = false;
		$hasError        = false;

		if(trim($_POST['your_name']) === '') {
			$hasError = true;
		} else {
			$name = trim($_POST['your_name']);
		}

		if(trim($_POST['your_email']) === '')  {
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['your_email']))) {
			$hasError = true;
		} else {
			$email = trim($_POST['your_email']);
		}

		if(trim($_POST['your_subject']) === '') {
			$hasError = true;
		} else {
			$subject = trim($_POST['your_subject']);
		}	

		if(trim($_POST['your_message']) === '') {
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
			    $comments = stripslashes(trim($_POST['your_message']));
			} else {
			    $comments = trim($_POST['your_message']);
			}
		}

		if ($error == false) {
			smtp_php_mailer($emailTo, $name, $email, $subject, $comments, $date, $user_ip, $host, $port, $username, $password);
			$sent   = true;

			insert_data_db($table_name, $name, $email, $subject, $comments, $date, $user_ip);
		
		}
	}

	$form = '
		<form class="contact-form wpcf7-form" method="post" action="'.get_permalink().'">
			<div>
				<input type="text" name="your_name" id="cf_name" size="50" maxlength="50"placeholder="'.$label_name.'" />
				<div class="error" id="error-name">'.$nameError.' </div>
			</div>
			<div>
				<input type="text" name="your_email" id="cf_email" size="50" maxlength="50" placeholder="'.$label_email.'" />
				<div class="error" id="error-email-msg1"> '.$emailError.'</div>
				<div class="error" id="error-email-msg2"> '.$emailInvalid.' </div>
			</div>
			<div>
				<input type="text" name="your_subject" id="cf_subject" size="50" maxlength="50" placeholder="'.$label_subject.'" />
				<div class="error" id="error-subject"> '.$subjectError.' </div>
			</div>
			<div>
				<textarea name="your_message" id="cf_message" cols="40" rows="10" placeholder="'.$label_message.'"></textarea>
				<div class="error" id="error-message"> '.$commentError.' </div>
			</div>
			<div>
				<input type="submit" value="'.$label_submit.'" name="send" id="cf_send" />
				<input type="hidden" name="submitted" id="submitted" value="true" />
			</div>
		</form>
	';
	return $form;
	
} 

add_shortcode('contact', 'wp_contact_form');

?>