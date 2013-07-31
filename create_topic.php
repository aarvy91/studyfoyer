<?php

// This script will allow you to create a topic in the category chosen
include ( './includes/header.php' );
 

// Check to see if the person accessing this page is logged in and that there is a category id in the url
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")) {
	header("Location: index.php");
	exit();
}
// Assign local variables found in the url
$cid = $_GET['cid'];
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forum Series - Create Forum Topic</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!-- IMPLEMENTING THE TINYMCE WYSIWYG EDITOR -->
<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas"
});
</script>
<!-- END TINYMCE SCRIPT -->

<div style="padding-left:35;">
<?php
echo "<p><h4>You are logged in as ".$_SESSION['username']." </h4>";
?>
</div>
<hr />

<div style="padding-left:35;padding-top:10;">
<div id="content">
<form action="create_topic_parse.php" method="post">
<h5>Topic Title</h5>
<input type="text" name="topic_title" size="98" maxlength="150" />
<br /><br />
<h5>Topic Content</h5>
<textarea name="topic_content" rows="5" cols="75"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="submit" name="topic_submit" class="submit" value="Create Your Topic" />
</form>
</div>
</div>

