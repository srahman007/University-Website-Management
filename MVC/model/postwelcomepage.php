<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="../view/applynow.css">
</head>
<body style="background-color: #CCD1D1 ">

	<h1>Welcome, <?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];
}
else{
	header("Location: postlogout.php");
}
?>
	</h1>

	<h2><p align="left";>
	<a href="posthome.php">Home</a>
	<a href="postsection.php">Course Details</a>
	<a href="../controller/postchangepassword.php">Change Password</a>
	<a href="../controller/postuserlist.php">User List</a></p></h2>


	<br><br>
	<h3>
	<p align="right";>
    <a href="postlogout.php">Logout</a></h3></p><br>
    

    
</body>
</html>