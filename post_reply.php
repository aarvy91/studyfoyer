<?php
include ( './includes/header.php' );
// This script will allow you to post a reply to the topic you are viewing

// Check to see if they person accessing this page is logged in and that there is a category id in the url
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")) {
	header("Location: index.php");
	exit();
}
// Assign local variables found in the url
$cid = $_GET['cid'];
$tid = $_GET['tid'];
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forum Series - Post Forum Reply</title>

<!-- IMPLEMENTING THE TINYMCE WYSIWYG EDITOR -->
<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas"
});
</script>
<!-- END TINYMCE SCRIPT -->



<div style="padding-left:35;>
<?php
echo "<p><h4>You are logged in as ".$_SESSION['username']." </h4>";
?>
</div>
<hr />
<div style="padding-left:35;padding-top:25;">
<div id="content">
<form action="post_reply_parse.php" method="post">
<p><h5>Reply Content</h5></p>
<textarea name="reply_content" rows="5" cols="75"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="hidden" name="tid" value="<?php echo $tid; ?>" />
<input type="submit" name="reply_submit" class="submit" value="Post Your Reply" />
</form>
</div>
</div>

