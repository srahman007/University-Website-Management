<?php

require 'facultyread.php';
require 'facultydelete.php';
$successfulMessage = $errorMessage ="";
$username = empty($_GET['username']) ? "" : $_GET['username'];
if(empty($_GET['search']) or empty($username)){
	$userlist = getallusers();
}
else{
	$userlist = getuser($username);
}

if(!empty($_GET['uid']) and !empty($_GET['uname'])){
 $response = removeuser($_GET['uid'], $_GET['uname']);
 if($response){
$successfulMessage = "Successfully deleted...!!!";
 }
 else{
 	$errorMessage = "Deletion failed...!!!";
 }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User List</title>
	<link rel="stylesheet" href="../view/applynow.css" type="text/css">
</head>
<body>
<h1>Student List</h1>
<div class="facultyuserlist">
<p><a href="../model/facultyhome.php">Home</a></p>

<hr>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
	<input type="text" name="username" value="<?php echo $username; ?>">
	<input type="submit" name="search" value="search">
</form>

<br>

<?php 
if(count($userlist) > 0){
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Username</th>";
echo "<th>Action</th>";
echo "</tr>";

for($i=0; $i<count($userlist); $i++){
echo "<tr>";
echo "<td>" . $userlist[$i]["id"] . "</td>";
echo "<td>" . $userlist[$i]["username"] . "</td>";
echo "<td> <a href='" . $_SERVER['PHP_SELF'] . "?uid=" . $userlist[$i]["id"] . "&uname=" . $userlist[$i]["username"] . "'>Delete</a></td>";
echo "</tr>";

}
  echo "</table>";
}
else{
echo "<h3>No records found!</h3>";
}
?>

<span style="color: green;"><?php echo $successfulMessage; ?></span>
<span style="color: red;"><?php echo $errorMessage; ?></span>
</div>
</body>
</html>