<?php 
	require 'underread.php';
	require 'underupdate.php';
    session_start();

	$username = $_SESSION['username'];
	$password = "";
	$isValid = true;
	$usernameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {

		$password = $_POST['password'];

		if(empty($username)) {
			$usernameErr = "Username can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}

		if($isValid) {
			if(strlen($username) > 15){
				$usernameErr = "Username can not be upper than 10 characters!";
			$isValid = false;
		}
			if(strlen($password) > 8){
				$passwordErr = "Password max size 8 characters!";
			$isValid = false;
		}

		if($isValid) {
		$username = test_input($username);
		$password = test_input($password);

		$response = changepassword($username, $password);
		if($response){
        	$successfulMessage = "Password changed successfully...!!!";
        }	
            else{
            	$errorMessage = "Login Failed...!!!";
            }
			
		}
	}
}


		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
	<link rel="stylesheet" href="../view/applynow.css" type="text/css">
</head>
<body style="background-color: #D6EAF8">
<div class="underchangepassword">
	<h1>Change Password</h1>

		<a href="../model/underhome.php">Home</a>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<hr>
		<fieldset>
			<legend>Change password form:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $username; ?>" disabled>
			<span style="color:red"><?php echo $usernameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="submit" name="submit" value="Change Password">

		</fieldset>
	</form>

	<br>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>

</div>

</body>
</html>