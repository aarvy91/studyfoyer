<?php
include ( './includes/header.php' );
$username = @$_GET['u'];
$check_username = mysql_query("SELECT * FROM users WHERE username='$user'");
$count  = mysql_num_rows($check_username);
if ($count == 1) {
while ($row = mysql_fetch_assoc($check_username)) {
      $id = $row['id'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $username = $row['username'];
      $email = $row['email'];
	  $password = $row['password'];
     
      
 
      
}
}
else
{
 header("Location: index.php");
}
?>
<div class="content">

<?php echo "<h2>$username's profile</h2> "; ?>

<div ="profimg">
	<img src="" height="200" width="150" alt="<?php echo $firstname; ?>" title="" />
</div>

<div ="utitle">
	<?php echo"<br />
      Name: $firstname $lastname<br />
      Email: $email";
	?>
</div>
</div>

<div class="worksoon">

<h4>We will improve the profile page in a day or two...till then learn something new!</h4>
<a class="submit" href="learn.php">Take a Course</a>
<h6>If you have some suggestions send us a mail on <b><font color="blue">info@studyfoyer.org</b></font><h6>

</div>

