<?php ob_start('ob_gzhandler');
session_start();
include ( './includes/connect_to_mysql.php' );
$user = "";
if (isset($_SESSION['username'])) {
 $user = $_SESSION['username'];
}
else
{
 $user = "";
}
?>
<?php include ( './includes/jscript.php' ); ?>
<html>
	<head><title>Studyfoyer</title>
	<link type="text/css" rel="stylesheet" href="./css/styles.css"  />	
	<link type="text/css" rel="stylesheet" href="./css/styles1.css"  />
	<script type="text/javascript" src="./js/custom.js"></script>
	

	</head>
		<body>
		<div><a href="https://github.com/sidoknowia/studyfoyer"><img style="position: absolute; top: 10; right: 0; border: 0;" src="./images/image-01.png" alt="Fork me on GitHub"></a></div>
			<div id="top">
			<div>
		<a href="https://github.com/sidoknowia/studyfoyer"><img style="position: absolute; top: -2; right: 1; border: 0;" src="./images/forkme.png" alt="Fork me on GitHub"></a>
		</div>
			<div id="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index.php"><img src="./images/studyfoyer.jpg" height="68px" width="250px"></a>
			</div>
			
						<div id="menu">
								
						<ul>
						<li><a href ="index.php">Home</a></li>
						<li><a href="learn.php">Learn</a></li>
						<li><a href="teach.php">Teach</a></li>
						<li><a href="forum.php">Ask a question</a></li>
						
						<?php if ($user == "") { echo '
                        <li><a href="login.php">Login</a></li>
						<li><a href="join.php">Join</a></li>
                         '; 
                         }
                         else
                         {
                        echo '
						<li><a href="profile.php?">Profile</a></li>
							
						
                        <li><a href="logout.php">Logout</a></li>';
                         }
                         ?>
						</ul>
					</div>
			
		</div>
		
	<br><br><br><br>
	
