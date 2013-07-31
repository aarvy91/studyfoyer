$(document).ready(function() {
	$("#register").click(function() {
		var process = true;
		$("#registration input").each(function() {
			if ($.trim(this.value) == "") {
				process = false;
			}
		});
		if (process == true) {
			// Check to see if username is more than 4 characters
			var firstname = $.trim($("#firstname").val());
			var lastname = $.trim($("#lastname").val());
			var username = $.trim($("#username").val());
			var email = $.trim($("#email").val());
			var password = $.trim($("#password").val());
			var verifypassword = $.trim($("#verifypassword").val());
			if (username.length >= 4) {
				// Check to see if the password match
				if (password == verifypassword) {
					// Check to see if username is taken
					$("#reg_span").html("<img src='images/loading.gif' height='20' align='absmiddle' />");
					$.post("./includes/parse_registration.php", { action: "check", email: email, username: username }, function(check_data) {
						if (check_data == 0) {
							// Everything is fine to use
							$("#registration input, #registration button").each(function() {
								$("#"+this.id).attr("disabled", "disabled");
							});
							$.post("./includes/parse_registration.php", { action: "register", firstname: firstname, lastname: lastname,username: username, email: email,  password: password }, function(reg_data) {
								if (reg_data == 1) {
									// Successfully registered
									$("#reg_span").empty();
									$("#reg_success").fadeIn(500);
								} else if (reg_data == 0) {
									// Registration failed.
									$("#reg_span").empty();
									$("#reg_failed").fadeIn(500);
								}
							});
						} else if (check_data == 1) {
							// Email already exists
							$("#reg_span").html("<font color='#ff0000' size='-1'>Email has already been used.</font>");
						} else if (check_data == 2) {
							// Username already exists
							$("#reg_span").html("<font color='#ff0000' size='-1'>Username is taken.</font>");
						} else if (check_data == 3) {
							// Invalid Email
							$("#reg_span").html("<font color='#ff0000' size='-1'>Email is invalid.</font>");
						} else {
							// Debugging
							alert(check_data);
						}
					});
				} else {
					$("#reg_span").html("<font color='#ff0000' size='-1'>password fields do not match.</font>");
				}
			} else {
				$("#reg_span").html("<font color='#ff0000' size='-1'>Username is too short.</font>");
			}
		} else {
			$("#reg_span").html("<font color='#ff0000' size='-1'>All fields required.</font>");
		}
	});
});