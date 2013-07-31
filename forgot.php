<?php include ( './includes/header.php' ); 

$error = "";
if (@$_POST['submit']) 

{

$email = mysql_real_escape_string(strip_tags($_POST['email']));

$check_email = mysql_query("SELECT email FROM users WHERE email='$email'");
$numrows_email = mysql_num_rows($check_email);
 
 if ($numrows_email != 0) 
	{
		
		die('check your email');
	}
 else
	{
		$error = 'That email is not registered.';
	}
 
}

?>

<div id="regcover">
<div id="registration">

<form action="forgot.php" method='POST'>

<div class="forgottitle"><h2>Forgot your password?</h2></div>

<table>

<tr><td>Email</td><td><input type='email' name='email' value='' style="width: 254px;"/></td><td><div class="flogbutton"><input type='submit' name='submit' value='submit' /></div></td></tr>
</table>


<h6>For any other assistance mail us on : <b><font color="blue">info@studyfoyer.org</b></font></h6>
<?php echo $error; ?>
</form>

</div>
</div>
