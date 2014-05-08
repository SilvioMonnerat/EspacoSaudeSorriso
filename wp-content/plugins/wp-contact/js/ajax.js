jQuery(document).ready(function(){
	//jQuery('.error').hide();

	jQuery("#cf_send").click(function() {
		//jQuery('.error').hide();

		var name = jQuery("input#cf_name").val();
		if (name == "") {
			jQuery("div#error-name").fadeIn("slow");
			jQuery("input#cf_name").focus();
			return false;
		}
		var email = jQuery("input#cf_email").val();
		if (email == "") {
			jQuery("div#error-email-msg1").fadeIn("slow");
			jQuery("input#cf_email").focus();
			return false;
		}

		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(!emailReg.test(email)) {
			jQuery("div#error-email-msg2").fadeIn("slow");
			jQuery("input#cf_email").focus();
			return false;
		}

		var subject = jQuery("input#cf_subject").val();
		if (subject == "") {
			jQuery("div#error-subject").fadeIn("slow");
			jQuery("input#cf_subject").focus();
			return false;
		}

		var msg = jQuery("textarea#cf_message").val();
		if (msg == "") {
			jQuery("div#error-message").fadeIn("slow");
			jQuery("textarea#cf_message").focus();
			return false;
		}

		/*var dataString = 'name='+ name + '&email=' + email + '&subject=' + subject + '&msg=' + msg;

		jQuery.ajax({
			type: "POST",
			url: mtheme_uri+"config.php",
			data: dataString,
			success: function() {
				jQuery(".contact-formt").hide();
				jQuery("div#successmessage").fadeIn("slow");
			}
		});
		return false;*/
	});
});
