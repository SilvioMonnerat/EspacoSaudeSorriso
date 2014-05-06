<?php
	
	require_once( '../../../../wp-load.php' );

	$emailTo = get_option( 'admin_email' );
	$subject = $_REQUEST['subject'];
	$name    = $_REQUEST['name'];
	$email   = $_REQUEST['email'];
	$msg     = $_REQUEST['msg'];

	$headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/html; charset=utf-8\n";
    $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

	$body = '
		<table style="width:100%; border:0;">
			<tr>
				<th style="text-align:right; vertical-align: top; text-transform: uppercase; padding-right: 10px;">Nome: </th>
				<td>'.$name.'</td>
			</tr>
			<tr>
				<th style="text-align:right; vertical-align: top; text-transform: uppercase; padding-right: 10px;">E-mail: </th>									
				<td>'.$email.'</td>
			</tr>
			<tr>
				<th style="text-align:right; vertical-align: top; text-transform: uppercase; padding-right: 10px;">Assunto: </th>
				<td>'.$subject.'</td>
			</tr>
			<tr>
				<th style="text-align:right; vertical-align: top; text-transform: uppercase; padding-right: 10px;">Mensagem: </th>
				<td>'.$msg.'</td>
			</tr>
		</table>
	';
	$sent = FALSE;

	if( wp_mail($emailTo, $subject, $body, $headers) ){
		$sent = TRUE; 
	?>
		<script type="text/javascript">
			jQuery("#contact").hide();
			jQuery("div#successmessage").fadeIn("slow");
		</script>

	<?php 
	} else{
		return $sent;
	}