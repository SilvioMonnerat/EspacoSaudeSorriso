<?php 
	
	// function to get the IP address of the user
	function get_the_ip() {
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
			return $_SERVER["HTTP_CLIENT_IP"];
		}
		else {
			return $_SERVER["REMOTE_ADDR"];
		}
	}

	function smtp_php_mailer($smtp_to, $smtp_name, $smtp_email, $smtp_subject, $smtp_message, $smtp_date, $smtp_ip, $smtp_host, $smtp_port, $smtp_user, $smtp_pass){
		require_once(dirname(__FILE__) . '/phpmailer/class-phpmailer.php');
		require_once(dirname(__FILE__) . '/phpmailer/class-smtp.php');
		require_once(dirname(__FILE__) . '/phpmailer/class-pop3.php');

		$smtp_body = "NOME:".$smtp_name." <br> EMAIL: ".$smtp_email." <br> ASSUNTO: ".$smtp_subject." <br> MENSAGEM: ".$smtp_message." <br> DATA ENVIO: ".$smtp_date." <br> IP: ".$smtp_ip."";

		// Inicia a classe PHPMailer
		$mail = new PHPMailer();

		//Define os dados do servidor e tipo de conexão
		$mail->SMTPDebug     = 0;
		$mail->Mailer        = 'smtp';
		$mail->IsSMTP();                   // Define que a mensagem será SMTP
		$mail->Host          = $smtp_host; // Endereço do servidor SMTP
		$mail->Port          = $smtp_port; // Define a porta do servidor
		$mail->SMTPAuth      = true;       // Autenticação
		$mail->Username      = $smtp_user; // Usuário do servidor SMTP
		$mail->Password      = $smtp_pass; // Senha da caixa postal utilizada
		$mail->SMTPKeepAlive = true;

		// Define o remetente
		$mail->From     = $smtp_name; // Seu e-mail
		$mail->Sender   = $smtp_to;   // Seu e-mail
		$mail->FromName = $smtp_name; // Seu nome

		// Define os destinatário(s)
		$mail->AddAddress($smtp_to);                // endereço de email que vai receber dados do formulário 
		$mail->AddReplyTo($smtp_email, $smtp_name); // campo para responder o email recebido do formulário

		// Define os dados técnicos da Mensagem
		$mail->IsHTML(true);      // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

		// Define a mensagem (Texto e Assunto)
		$mail->Subject = $smtp_subject;  // Assunto da mensagem
		$mail->Body    = $smtp_body;     // corpo do email no formato em HTML

		// Envia o e-mail
		$enviando = $mail->Send();

		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();

		if ($enviando) {
			$sent      = true;	
		} else {
			$errorFail = __( 'Não foi possível enviar o e-mail. Informações do erro: ' .$mail->ErrorInfo, 'wp_contact' );
		}
	}

	function insert_data_db($db_table, $db_name, $db_email, $db_subject, $db_message, $db_date, $db_ip){
		global $wpdb;
		$query = $wpdb->insert( $db_table, 
			array(
				'name'    => $db_name,
				'email'   => $db_email,
				'subject' => $db_subject,
				'message' => $db_message,
				'date'    => $db_date,
				'ip'      => $db_ip
			)
		);
	}

	function plugin_scripts(){
	    wp_register_script('ajax', plugin_dir_url( __FILE__ ).'js/ajax.js');
	    wp_enqueue_script('ajax');
	
	}	add_action('wp_enqueue_scripts','plugin_scripts');