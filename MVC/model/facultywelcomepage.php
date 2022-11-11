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
	header("Location: facultylogout.php");
}
?>
</h1>
<h2><p align="left";>
	<a href="facultyhome.php">Home</a>
	<a href="facultysection.php">Course Details</a>
	<a href="../controller/facultychangepassword.php">Change Password</a>
	<a href="../controller/facultyuserlist.php">User List</a></p></h2>


	<br><br>

	<h3><p align="right";>
    <a href="facultylogout.php">Logout</a></h3></p><br>
    

    
</body>
</html>