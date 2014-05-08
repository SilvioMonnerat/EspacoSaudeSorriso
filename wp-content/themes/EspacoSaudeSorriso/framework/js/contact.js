jQuery(document).ready(function(){
	jQuery('.error').hide();

	jQuery(".bt_button").click(function() {
		jQuery('.error').hide();

		var name = jQuery("input#name").val();
		if (name == "") {
			jQuery("div#error-name").fadeIn("slow");
			jQuery("input#name").focus();
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

		/*var dataString = 'name='+ name + '&email=' + email + '&subject=' + subject + '&msg=' + msg;

		jQuery.ajax({
			type: "POST",
			url: mtheme_uri + "/framework/sendmail.php",
			data: dataString,
			success: function() {
				jQuery("#contact").hide();
				jQuery("div#successmessage").fadeIn("slow");
			}
		});
		return false;*/
	});
});

