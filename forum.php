<?php include ( './includes/header.php' );  ?>
<div id="forumheadingpos">
<div id="forumheading">
Ask a question, someone will answer you...
</div>
</div>

<div id="contentpos">
<div id="content">

<?php
// Select all the data from the categories table in your database and order them by the category_title
$sql = "SELECT * FROM categories ORDER BY category_title ASC";
// Execute the SELECT query
$res = mysql_query($sql) or die(mysql_error());
$categories = "";
// Check to make sure that the categories table has data in it
if (mysql_num_rows($res) > 0) {
	// Retrieve data from the categories table
	while ($row = mysql_fetch_assoc($res)) {
		// Assign local variables from each field in the categories table
		$id = $row['id'];
		$title = $row['category_title'];
		$description = $row['category_description'];
		// Append the data from the categories table into a list of links
		$categories .= "<a href='view_category.php?cid=".$id."' class='cat_links'>".$title."  <br><font size='-1'>".$description."</font></a>";
	}
	// Display list of links
	echo $categories;
} else {
	// If there are is no data in the categories table
	echo "<p>There are no categories available yet.</p>";
}
?>

</div>
</div>
<?php include ( './includes/footer.php' ); ?>