<?php 
require 'DBconnection2.php';
if(isset($_POST['create'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$idnumber = $_POST['idnumber'];
$phone = $_POST['phone'];

$sql = "INSERT INTO pohela (firstname, lastname, idnumber, phone) values (?,?,?,?)";
$stmtinsert = $db->prepare($sql);
$result = $stmtinsert->execute([$firstname,$lastname,$idnumber,$phone]);
if($result){
	echo 'Successfully saved...!!! Please take your pass from ANNEX 4(40321)';
}
else{
	echo 'Error';
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pohela Boishakh Registration</title>
</head>
<body style="background-color: #B2BABB  ">

	<h1><p align="middle"><i>Pohela Boishakh(15th August 2021)</i></h1><hr>
	<h2><br><br>What's inside in our program?<br></h2>
		<h3>1.Pitha & sweet stalls.<br>
			2.Dance performance.<br>
			3.Concert by AIUB students.<br>
			4.Classical Bangla song program.<br></h3></p>

			<marquee direction="right"  bgcolor="#C0392B">
<h2><a href="#" style="color:white";>Want to attend? Please Register Below.</a></h2></marquee>

	<form action="pohelareg.php" method="POST">
 	 <fieldset>
 	 	<legend>Account Information:</legend>

			<label for="firstname">Firstname:</label>
			<input type="text" name="firstname" required>

			<br><br>

			<label for="lastname">Lastname:</label>
			<input type="text" name="lastname" required>

			<br><br>

			<label for="idnumber">ID Number:</label>
			<input type="text" name="idnumber" required>

			<br><br>

			<label for="phone">Phone:</label>
			<input type="text" name="phone" required>

			<br>

			
</fieldset>
<br><br>
			<input type="submit" name="create" value="Register">
		
	</form>


</body>
</html>