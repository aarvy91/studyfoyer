<?php
include('connect_to_mysql.php');
 if (isset($_POST['action']) && $_POST['action'] == "check") {
	$email = mysql_real_escape_string(strip_tags($_POST['email']));
	$username = mysql_real_escape_string(strip_tags($_POST['username']));
	
	if (strpos($email, "@") !== false) {
		$check_email = explode("@", $email);
		if (strpos($check_email[1], ".") === false) {
			echo 3;
			exit();
		}
	} else {
		echo 3;
		exit();
	}
	$email_query = mysql_query("SELECT id FROM users WHERE email='$email' LIMIT 1");
	if (mysql_num_rows($email_query) == 1) {
		// Email already exists
		echo 1;
		exit();
	} else {
		$username_query = mysql_query("SELECT username FROM users WHERE username='$username' LIMIT 1");
		if (mysql_num_rows($username_query) == 1) {
			// Username already exists
			echo 2;
			exit();
		} else {
			// Everything is fine to use.
			echo 0;
			exit();
		}
	}
}
if (isset($_POST['action']) && $_POST['action'] == "register") {
	$firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
	$lastname = mysql_real_escape_string(strip_tags($_POST['lastname']));
	$email = mysql_real_escape_string(strip_tags($_POST['email']));
	$username = mysql_real_escape_string(strip_tags($_POST['username']));
	$password = mysql_real_escape_string(strip_tags($_POST['password']));
	$salt1 = "siddharth";
	$salt1 = md5($salt1);
	$salt2 = "pizza";
	$salt2 = md5($salt2);
	$salt3 = "php";
	$salt3 = md5($salt3);
	$password = $salt1.$password.$salt3;
	$password = md5($password.$salt2);
	
	
	 $reg_query =  mysql_query("INSERT INTO users VALUES('','$firstname','$lastname','$username','$email','$password','no','','')");
	
	
	if ($reg_query) {
		// Successfully registered and can create users folders and send activation email		
		echo 1;
		exit();
	} else {
		// Registration failed
		echo 0;
		exit();
	}
}
?>