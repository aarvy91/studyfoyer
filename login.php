<?php
include ( './includes/header.php' );

if (isset($_POST['username'])&&($_POST['password'])) {
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
 // echo $username;
   $salt1 = "siddharth";
   $salt1 = md5($salt1);
   $salt2 = "pizza";
   $salt2 = md5($salt2);
   $salt3 = "php";
   $salt3 = md5($salt3);
   $password = $salt1.$password.$salt3;
   $password = md5($password.$salt2);
 

 $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
 $res = mysql_query($sql) or die(mysql_error());
	// Check to see if the data entered into the login form matches the database information
	if (mysql_num_rows($res) == 1) {
		// Pull data from the database
		$row = mysql_fetch_assoc($res);
		// Assign session variables with the id and username from the database
		$_SESSION['uid'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['username'] = $row['username'];
		header("Location: index.php");
		exit();
	} else {
		echo "Invalid login information. Please return to the previous page.";
		exit();
	}

    header("Location:index.php");
   
  }
 


?>

<div id="regcover">
<div id="registration">

<div class="formtitle"><h2>Login to Your Account</h2></div>

<form action='login.php' method='POST'>
<table>
<tr><td>Username<p></td><td><input type='text' name='username' value='Username ...' style="width: 250px;" onclick='value=""'/><p /></tr></td>
<tr><td>Password<p></td><td><input type='password' name='password' value='Password ...' style="width: 250px;" onclick='value=""'/><p /></tr></td>
</table>
<div class="loginbutton"><input type='submit' name='submit' value='Login' class="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="forgot.php">Forgot your password?</a></div>

</form>

<?php include ( './includes/footer.php' ); ?>




