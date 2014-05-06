<?php
/*
Template Name: Template: Contact Us
*/
?>
 
<?php
	if(isset($_POST['submitted'])) {
        if(trim($_POST['contactName']) === '') {
               $nameError = __( 'Please enter your name.', 'framework' );
               $hasError = true;
        } else {
               $name = trim($_POST['contactName']);
        }
 
        if(trim($_POST['email']) === '')  {
               $emailError = __( 'Please enter your email address.', 'framework' );
               $hasError = true;
        } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
               $emailError = __( 'You entered an invalid email address.', 'framework' );
               $hasError = true;
        } else {
               $email = trim($_POST['email']);
        }

        if(trim($_POST['subject']) === '') {
               $subjectError = __( 'Please enter your subject.', 'framework' );
               $hasError = true;
        } else {
               $subject = trim($_POST['subject']);
        }	
 		
        if(trim($_POST['comments']) === '') {
               $commentError = __( 'Please enter a message.', 'framework' );
               $hasError = true;
        } else {
               if(function_exists('stripslashes')) {
                       $comments = stripslashes(trim($_POST['comments']));
               } else {
                       $comments = trim($_POST['comments']);
               }
        }
 
        if(!isset($hasError)) {
			
			$to      = get_option('admin_email');
			$subject = '[PHP Snippets] Subject: '.$subject;
			$body    = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail($to, $subject, $body, $headers);
			$emailSent = true;
        }	 
	} 
?>
<?php get_header(); ?>

<div class="container content">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('full-width-page clearfix'); ?>> 
			
			<!-- entry content -->
			<div class="entry-content">
				<div class="container">

					<div class="one-sixth">
						<div class="center">
							<p>
								<a href="mailto:contato@espacosaudesorriso.com" target="_blank">
									<img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/email-icon.png" rel="PrettyPhoto[18]">
								</a>
							</p>
							<h3><?php _e( 'Email', 'framework' ) ?></h3><p><?php _e( 'contato@espacosaudesorriso.com', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p><img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/phone-icon.png"></p>
							<h3><?php _e( 'Telefone', 'framework' ) ?></h3><p><?php _e( '+ 55 21 2707 2034', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p><img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/address-icon.png"></p>
							<h3><?php _e( 'Endereço', 'framework' ) ?></h3><p><?php _e( 'Rua Otávio Carneiro nº 100 – sala 809 – Icaraí – Niterói – Rj', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p>
								<a href="http://espacosaudesorriso.com">
									<img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/website-icon.png" rel="PrettyPhoto[18]">
								</a>
							</p>
							<h3><?php _e( 'Website', 'framework' ) ?></h3><p><?php _e( 'http://espacosaudesorriso.com', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p>
								<a href="http://www.facebook.com" target="_blank">
									<img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/fb-icon.png" rel="PrettyPhoto[18]">
								</a>
							</p>
							<h3><?php _e( 'Facebook', 'framework' ) ?></h3><p><?php _e( 'Fans', 'framework' ) ?></p>
						</div>
					</div>


					<div style="padding-bottom: 30px; margin-top: 15px;" class="space-divider"></div>

					<div class="one-half">
						<h2 class="styled-title"><?php _e( 'PREENCHA', 'framework' ) ?> O<span class="custom-word"> <?php _e( 'FORMULÁRIO', 'framework' ) ?></span><span class="title-arrow"></span></h2>

						<div id="contactform">
							<?php if(isset($emailSent) && $emailSent == true) { ?>
								<p class="success"><?php _e( 'Thanks, your email was sent successfully.', 'framework' ) ?></p>
							<?php } else { ?>
							<?php if(isset($hasError) || isset($captchaError)) { ?>
								<p class="fail"><?php _e( 'Sorry, an error occured.', 'framework' ) ?><p>
							<?php } ?>

							<form action="<?php the_permalink(); ?>" method="post" id="contactForm" class="wpcf7-form">
								<ul>
									<li>
										<input type="text" name="contactName" id="contactName" class="wpcf7-form-control wpcf7-text" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="<?php _e( 'Name', 'framework' ) ?>" />
										<div class="error" id="error-name"> <?php if($nameError != '') { echo $nameError; } ?> </div>
									</li>

									<li>
										<input type="text" name="email" id="email" class="wpcf7-form-control wpcf7-text" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="<?php _e( 'Email', 'framework' ) ?>" />
										<div class="error" id="error-email-msg1"> <?php if($emailError != '') { echo $emailError; } ?> </div>
										<div class="error" id="error-email-msg2"> <?php if($emailError != '') { echo $emailError; } ?> </div>
									</li>

									<li>
										<input type="text" name="subject" id="subject" class="wpcf7-form-control wpcf7-text" value="<?php if(isset($_POST['subject']))  echo $_POST['subject'];?>" placeholder="<?php _e( 'Subject', 'framework' ) ?>" />
										<div class="error" id="error-subject"> <?php if($subjectError != '') { echo $subjectError; } ?> </div>
									</li>

									<li>
										<textarea name="comments" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" id="commentsText" aria-required="true" aria-invalid="false" placeholder="<?php _e( 'Message', 'framework' ) ?>"></textarea>
										<div class="error" id="error-message"> <?php if($commentError != '') { echo $commentError; } ?> </div>
									</li>

									<li>
										<input type="submit" class="bt_button" value="<?php _e( 'Send', 'framework' ) ?>" />
									</li>
								</ul>
								<input type="hidden" name="submitted" id="submitted" value="true" />
							</form>
							<?php } ?>
						</div>
						<script type="text/javascript">
							jQuery(document).ready(function(){
								jQuery(".bt_button").click(function() {
									jQuery('.error').hide();

									var name = jQuery("input#contactName").val();
									if (name == "") {
										jQuery("div#error-name").fadeIn("slow");
										jQuery("input#contactName").focus();
										return false;
									}
									var email = jQuery("input#email").val();
									if (email == "") {
										jQuery("div#error-email-msg1").fadeIn("slow");
										jQuery("input#email").focus();
										return false;
									}

									var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
									if(!emailReg.test(email)) {
										jQuery("div#error-email-msg2").fadeIn("slow");
										jQuery("input#email").focus();
										return false;
									}

									var subject = jQuery("input#subject").val();
									if (subject == "") {
										jQuery("div#error-subject").fadeIn("slow");
										jQuery("textarea#subject").focus();
										return false;
									}

									var msg = jQuery("textarea#msg").val();
									if (msg == "") {
										jQuery("div#error-message").fadeIn("slow");
										jQuery("textarea#msg").focus();
										return false;
									}
								});
							});
						</script>

					</div>

					<div class="one-half last">
						<h2 class="styled-title"><?php _e( 'NOSSA', 'framework' ) ?><span class="custom-word"> <?php _e( 'CLÍNICA', 'framework' ) ?></span><span class="title-arrow"></span></h2>
						<?php the_content() ?> 
					</div>
					<div class="clearfix"></div></div>
			</div>
			<!-- entry content end--> 
		</article>
		<!--post-end-->
		
	<?php endwhile; else: ?>

		<p>	<?php _e('Sorry, no posts matched your criteria', 'framework') ?>. </p>

	<?php endif; ?>
</div>
<!-- content end -->
<?php get_footer(); ?>