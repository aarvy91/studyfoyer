<?php include ( './includes/header.php' ); 
$error = "";
if (@$_POST['send']) {

 $name = mysql_real_escape_string(strip_tags($_POST['name']));
 $email = mysql_real_escape_string(strip_tags($_POST['email']));
 $message = mysql_real_escape_string(strip_tags($_POST['message']));
 
 
 if ($name == "") {
  $error = "Name cannot be left empty.";
 }
 
 
 else if ($email == "") {
		$error = "Enter valid email id";
 }

 else if ($message == "") {
  $error = "Message cannot be left empty.";
 }
 
 else
 {
 //send message
 $sendmessage = mysql_query("INSERT INTO contact VALUES('','$name','$email','$message')");
 die('Message sent!!');
 }
 }

?>

<div id="regcover">
<div id="registration">

<form action="contact.php" method='POST'>

<div class="contacttitle"><h2>Contact Us</h2></div>

<table>
<tr><td>Name</td><td><input type='text'  name='name' value='' style="width: 254px;" /></td></tr>
<tr><td>Email</td><td><input type='email' name='email' value='' style="width: 254px;"/></td></tr>
<tr><td>Message</td><td><textarea cols="29" rows="6"  name="message"></textarea></td></tr>

</table><br>

<div class="clogbutton"><input type='submit' name='send' class="submit" value='Send' /><p></div>
<h6>You can also mail us on : <b><font color="blue">info@studyfoyer.org</b></font></h6>
<?php echo $error; ?>
</form>

</div>
</div>




