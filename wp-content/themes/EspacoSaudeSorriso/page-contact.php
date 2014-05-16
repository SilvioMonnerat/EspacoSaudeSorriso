<?php
	/* ------------------------------------------------------------------------ */
	/* Template Name: Page: Contact
	/* ------------------------------------------------------------------------ */
	global $wpdb;
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

	if(isset($_POST['submitted'])) {
		ini_set('default_charset','UTF-8');

        if(trim($_POST['nome']) === '') {
               $nameError = __( 'Please enter your name.', 'framework' );
               $hasError = true;
        } else {
               $nome = trim($_POST['nome']);
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
               $assunto = trim($_POST['subject']);
        }	
 		
        if(trim($_POST['msg']) === '') {
               $commentError = __( 'Please enter a message.', 'framework' );
               $hasError = true;
        } else {
               if(function_exists('stripslashes')) {
                       $mensagem = stripslashes(trim($_POST['msg']));
               } else {
                       $mensagem = trim($_POST['msg']);
               }
        }

        // variaves de configuração
		$username = 'contato@espacosaudesorriso.com';
		$password = 'ocapse4102';
		$host     = 'smtp.espacosaudesorriso.com';
		$port     = '587';

		$data     = date('d/m/Y');
		$to       = get_option('admin_email');

		if (!empty($_SERVER["HTTP_CLIENT_IP"]))	{
			//check for ip from share internet
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			// Check for the Proxy User
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else{
			$ip = $_SERVER["REMOTE_ADDR"];
		}
		//echo $ip;
 
        if(!isset($hasError)) {

			require_once ('./wp-includes/class-phpmailer.php');
			require_once ('./wp-includes/class-smtp.php');


			$content = "NOME: $nome <br> EMAIL: $email <br> ASSUNTO: $assunto <br> MENSAGEM: $mensagem <br> DATA ENVIO: $data <br> IP: $ip";

			// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer || TROQUE PELO SEU CAMINHO DA CLASSE

			// Inicia a classe PHPMailer
			$mail = new PHPMailer();
			//Define os dados do servidor e tipo de conexão
			$mail->SMTPDebug     = 0;
			$mail->Mailer        = 'smtp';
			$mail->IsSMTP();                  // Define que a mensagem será SMTP
			$mail->Host          = $host;     // Endereço do servidor SMTP
			$mail->Port          = $port;     // Define a porta do servidor
			$mail->SMTPAuth      = true;      // Autenticação
			$mail->Username      = $username; // Usuário do servidor SMTP
			$mail->Password      = $password; // Senha da caixa postal utilizada
			$mail->SMTPKeepAlive = true;

			// Define o remetente
			$mail->From     = $nome; // Seu e-mail
			$mail->Sender   = $to;   // Seu e-mail
			$mail->FromName = $nome; // Seu nome

			// Define os destinatário(s)
			$mail->AddAddress($to);
			$mail->AddReplyTo($email, $nome);

			// Define os dados técnicos da Mensagem
			$mail->IsHTML(true);      // Define que o e-mail será enviado como HTML
			$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

			// Define a mensagem (Texto e Assunto)
			$mail->Subject = $assunto;  // Assunto da mensagem
			$mail->Body    = $content; // corpo do email no formato em HTML

			// Envia o e-mail
			$enviado = $mail->Send();

			// Limpa os destinatários e os anexos
			$mail->ClearAllRecipients();

			// Exibe uma mensagem de resultado
			if ($enviado) {
				$query = $wpdb->insert( wp_contact, 
					array(
						'ip'      => $ip,
						'name'    => $nome,
						'email'   => $email,
						'subject' => $assunto,
						'message' => $mensagem,
						'date'    => $data
					)
				);

				$emailSent = true;
			} else {
				$errorFail = __( 'Não foi possível enviar o e-mail. Informações do erro: ' .$mail->ErrorInfo, 'framework' );
			}		
			
        }	 
	}
	

	function uri_path_script() { 
?>
		<script type="text/javascript">
			var mtheme_uri="<?php echo get_stylesheet_directory_uri(); ?>";
		</script>
<?php
	}	add_action('wp_head', 'uri_path_script');

	get_header();
?>

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
							<h3><?php _e( 'Telefone', 'framework' ) ?></h3><p><?php _e( '+ 55 21 3062-2007 ', 'framework' ) ?><br /><?php _e( '+ 55 21 2611-3138 ', 'framework' ) ?></p>
						</div>
					</div>

					<div class="one-sixth">
						<div class="center">
							<p><img title="" alt="" src="http://espacosaudesorriso.com/wp-content/uploads/2013/09/address-icon.png"></p>
							<h3><?php _e( 'Endereço', 'framework' ) ?></h3><p><?php _e( 'Rua Otávio Carneiro nº 100 – sala 807 – Icaraí – Niterói – Rj', 'framework' ) ?></p>
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
							<div id="successmessage">
								<?php _e( 'Mensagem enviada com sucesso.', 'framework' ) ?>
							</div>
							<?php if(isset($emailSent) && $emailSent == true) { ?>
								<p class="success"><?php _e( 'Thanks, your email was sent successfully.', 'framework' ) ?></p>
							<?php } else { ?>
							<?php if(isset($hasError) || isset($errorFail)) { ?>
								<p class="fail"><?php echo $errorFail; //_e( 'Sorry, an error occured.', 'framework' ) ?><p>
							<?php } ?>
								<form action="<?php the_permalink() ?>" method="POST" id="contact" class="wpcf7-form">

									<input type="text" name="nome" id="name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required name" placeholder="<?php _e( 'Nome', 'framework' ) ?>">
									<div class="error" id="error-name">
										<?php _e( 'Campo Nome obrigatório!', 'framework' ) ?>
									</div>
									
									<input type="email" name="email" id="email" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email email" placeholder="<?php _e( 'E-mail', 'framework' ) ?> ">
									<div class="error" id="error-email-msg1">
										<?php _e( 'Campo E-mail obrigatório!', 'framework' ) ?>
									</div>
									<div class="error" id="error-email-msg2">
										<?php _e( 'Digite um email válido.', 'framework' ) ?>
									</div>

									<input type="text" name="subject" id="subject" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required assunto" placeholder="<?php _e( 'Assunto', 'framework' ) ?>">
									<div class="error" id="error-subject">
										<?php _e( 'Campo Assunto obrigatório!', 'framework' ) ?>
									</div>

									<textarea name="msg" cols="40" rows="10" id="msg" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required mensagem" placeholder="<?php _e( 'Mensagem', 'framework' ) ?>"></textarea>
									<div class="error" id="error-message">
										<?php _e( 'Campo Mensagem obrigatório!', 'framework' ) ?>
									</div>

									<input type="hidden" name="submitted" id="submitted" value="true" />
									
									<input type="submit" name="submit" class="wpcf7-form-control wpcf7-submit bt_button" id="submit_button bt_button" value="<?php _e( 'Enviar', 'framework' ) ?>">
								</form>
							<?php } ?>
						</div>

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
