<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
</head>
<body style="background-color: #CCD1D1 ">

	<h1>HOME <?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];
} 
?>
	<h2><p align="left";>
	<a href="facultysection.php">Course Details</a>
	<a href="../controller/facultychangepassword.php">Change Password</a>
	<a href="../controller/facultyuserlist.php">User List</a>
	<p align="right";>
    <a href="facultylogout.php">Logout</a></h2></p><br>

    
</body>
</html>