<?php
include ( './includes/header.php' );
?>

<div id="regcover">
<div id="registration">
<div class="formtitle"><h2>Create your account</h2></div>

<table id="registeration">
<tr><td>First name</td><td><input type='text'  name='firstname' id='firstname' style="width: 250px;" /></td></tr>
<tr><td>Last name</td><td><input type='text' name='lastname' id='lastname'  style="width: 250px;"/></td></tr>
<tr><td>User name</td><td><input type='text' name='username' id='username' style="width: 250px;"/></td></tr>
<tr><td>Email</td><td><input type='email' name='email' id='email'  style="width: 250px;"/></td></tr>
<tr><td>Password</td><td><input type='password' name='password' id='password'  style="width: 250px;" /></td></tr>
<tr><td>Repeat Password</td><td><input type='password' name='verifypassword' id='verifypassword' style="width: 250px;"/></td></tr><p>
</table><br>
<div class="logbutton"><span id="reg_span" style="padding-right: 10px;"></span><button name='register' id="register" class="submit">Sign Up</button></div>
<div align="left" class="hidden" id="reg_success"><h3>Congratulations!</h3><br /><p style="margin-left: auto;">Your account has been successfully registered.</p></div>
<div align="left" class="hidden" id="reg_failed"><h3>Sorry!</h3><br /><p style="margin-left: auto;">Something has went wrong during the registration process. Please trry again.</p></div>
</div>
</div>

<?php include ( './includes/footer.php' ); ?>