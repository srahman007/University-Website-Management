<?php 
require 'DBconnection2.php';
if(isset($_POST['create'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$idnumber = $_POST['idnumber'];
$phone = $_POST['phone'];

$sql = "INSERT INTO bookfair (firstname, lastname, idnumber, phone) values (?,?,?,?)";
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
	<title>Book Fair Registration</title>
</head>
<body style="background-color: #B2BABB ">

	<h1>Registration For pass:</h1>

	<h1><p align="middle">AIUB Book Fair</h1>
	<h2><p align="right">Duration: 16-20August 2021</h2><hr>
	<h2><br>Program Details:<br></h2>
		<h3>1.Bookfair duration 9A.M to 3P.M<br>
			2.Program will be situated at Annex 5.<br>
			3.No hand camera will be allowed.<br>
			4.Don't forget to bring your entry pass with you.<br></h3></p>

			<marquee direction="right"  bgcolor="#B7950B ">
<h2><a href="#" style="color:white";>Want to attend? Please Register Below.</a></h2></marquee>

	<form action="bookreg.php" method="POST">
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