<?php 
	require 'facultyread.php';
	$username = $password = "";
	$isValid = true;
	$usernameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$username = $_POST['username'];
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

		$response = login($username, $password);
		if($response){
        	session_start();
        	$_SESSION['username'] = $username;
        	header("Location: ../model/facultywelcomepage.php");
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
	<title>Login Form</title>
	<link rel="stylesheet" href="../view/applynow.css">
</head>
<body style="background-color: #D6EAF8">

	<div class="underlogin">
	<h1><img src="../view/logo.png" width="40" height="40" title="Logo of a company" alt="Logo of a company">Login Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return isValid()" name="mForm" id="nForm">
		<fieldset>
			<legend>Login Form:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $username; ?>">
			<span style="color:red"><?php echo $usernameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="submit" name="submit" value="Login">
			<br>
			<p>Don't have account? <a href="faculty.php">Click here</a> for registration.</p>
		</fieldset>
	</form>
</div>

<script>
	function(){
		var username = document.forms["mForm"]["username"].value;
		if(username === ""){
			document.getElementById("usernameErr").innerHTML = "";
			return false;
		}
	}


</script>
	<br>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>


</body>
</html>