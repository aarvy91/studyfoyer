<?php
include ( './includes/header.php' );

if (isset($_POST['create_channel'])) {
 header("Location: create_channel.php"); 
}
$get_profile_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
$numrows_profile_pic = mysql_num_rows($get_profile_pic);
if ($numrows_profile_pic == 1) {
while ($row = mysql_fetch_assoc($get_profile_pic)) {
 $profile_pic = $row['profile_pic']; 
 
 if ($profile_pic == '') {
 echo "<img src='./data/users/images/icons/default.jpg' height='120'>";
 }
 else {
 echo "<img src='./data/users/images/icons/$profile_pic' height='120'>";
 }
}
}
else {
 die('unknown error'); 
}
?>
<h2>Members Page</h2>

Your channels:<p />
<?php
$channel_check = mysql_query("SELECT channel_name FROM channels WHERE created_by='$user'");
$numrows_cc = mysql_num_rows($channel_check);
if ($numrows_cc == 0) {
 echo ''; // They don't have any channels so they need to create one
 ?>
 You haven't made any channels yet, click the button to make one.
 <form action='create_channel.php'>
 <input type='submit' name='goto_channel_create' value='Create my Channel' />
 </form>
 <?php
}
else
{
 while($row = mysql_fetch_assoc($channel_check)) {
  $channel_name = $row['channel_name'];
  echo "<b>$channel_name</b> - <a href='channel.php?c=$channel_name'>View Channel</a> | <a href='channel_settings.php?c=$channel_name'>Channel Settings</a><p />";
 }
echo "$numrows_cc/5 Channels Created";
}
?>