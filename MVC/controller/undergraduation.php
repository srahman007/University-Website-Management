<?php
    require 'underinsert.php';
	$fullname = $gender = $dob = $address = $email = $ssc = $sscinstitute = $hsc = $hscinstitute = $username = $password = "";
	$isValid = true;

	$fullnameErr = $genderErr = $dobErr = $addressErr = $emailErr = $sscErr = $sscinstituteErr = $hscErr = $hscinstituteErr = $usernameErr = $passwordErr = "";

	$successfulMessage = $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] === "POST") {
        
        $fullname = $_POST['fullname'];
		$gender = isset($_POST['gender']);
		$dob = $_POST['dob'];
		$address = $_POST['address'];
        $email = $_POST['email'];
        $ssc = $_POST['ssc'];
        $sscinstitute = $_POST['sscinstitute'];
        $hsc = $_POST['hsc'];
        $hscinstitute = $_POST['hscinstitute'];

		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($fullname)) {
			$fullnameErr = "Name can not be empty!";
			$isValid = false;
		}
		if(empty($gender)) {
			$genderErr = "Gender can not be empty!";
			$isValid = false;
		}
		if(empty($dob)) {
			$dobErr = "Date of Birth can not be empty!";
			$isValid = false;
		}
		if(empty($address )) {
			$addressErr = "Address can not be empty!";
			$isValid = false;
		}
		if(empty($email)) {
			$emailErr = "E-mail can not be empty!";
			$isValid = false;
		}
        if(empty($ssc)) {
			$sscErr = "SSC Result field can not be empty!";
			$isValid = false;
		}
		if(empty($sscinstitute)) {
			$sscinstituteErr = "SSC Institute Name can not be empty!";
			$isValid = false;
		}
		if(empty($hsc)) {
			$hscErr = "HSC Result field can not be empty!";
			$isValid = false;
		}
		if(empty($hscinstitute)) {
			$hscinstituteErr = "HSC Institute Name can not be empty!";
			$isValid = false;
		}

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
		if($isValid){

			$fullname = test_input($fullname);
            $gender = test_input($gender);
            $dob      = test_input($dob);
            $address = test_input($address);
            $email = test_input($email);
            $ssc = test_input($ssc);
            $sscinstitute = test_input($sscinstitute);
            $hsc = test_input($hsc);
            $hscinstitute = test_input($hscinstitute);

			$username = test_input($username);
			$password = test_input($password);

			$response = register($fullname, $gender, $dob, $address, $email, $ssc, $sscinstitute, $hsc, $hscinstitute, $username, $password);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
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
	<title>Registration Form</title>
	<link rel="stylesheet" href="../view/applynow.css" type="text/css">
</head>
<body style="background-color: #ABEBC6 ">
<div class="main">
	<h1>Registration Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return isValid()" name="mForm" id="nForm">
		<fieldset>
			<legend><b>Registration Form:</b></legend>

			<label for="fullname">Full Name:</label>
			<input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>">
			<span style="color:red"><?php echo $fullnameErr; ?></span>

			<br>

			<h4>Gender: <span style="color:red"><?php echo $genderErr; ?></span></h4>
		
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male");?> value="<?php echo $gender; ?>">Male

        <br>

		<input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female");?> value="<?php echo $gender; ?>">Female
        
        <br>

        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="other");?> value="<?php echo $gender; ?>">Other
		 


		<br><br>

			<label style="color:black" for="dob">Date of birth:</label>
 	        <input type="date" id="dob"name="dob" value="<?php echo $dob; ?>">
 	        <span style="color:red"><?php echo $dobErr; ?></span>	

 	        <br><br>
 	      
		</fieldset>
		<fieldset>
			<legend><b>Contact Infromation:</b></legend>

 	        <label for="address">Address:</label>
			<textarea type="text" name="address" id="address" value="<?php echo $address; ?>"></textarea>
			<span style="color:red"><?php echo $addressErr; ?></span>

			<br><br>

             <label for="email">Email:</label>
 	         <input type="email" id="email"name="email" value="<?php echo $email; ?>">
 	         <span style="color:red"><?php echo $emailErr; ?></span>

 	        
			<br><br>
			
 	 </fieldset>
 	 <fieldset>
 	 	<legend><b>Educational Information:</b></legend>
 	 	<fieldset>
 	 		<legend><b>SSC Information:</b></legend>

 	 	<label for="ssc">SSC Result:</label>
			<input type="text" name="ssc" id="ssc" value="<?php echo $ssc; ?>">
			<span style="color:red"><?php echo $sscErr; ?></span>

			<label for="sscinstitute">Institute Name:</label>
			<textarea type="text" name="sscinstitute" id="sscinstitute" value="<?php echo $sscinstitute; ?>"></textarea>
			<span style="color:red"><?php echo $sscinstituteErr; ?></span>
		</fieldset>

        <br><br>

		<fieldset>
			<legend><b>HSC Information:</b></legend>

			<label for="hsc">HSC Result:</label>
			<input type="text" name="hsc" id="hsc" value="<?php echo $hsc; ?>">
			<span style="color:red"><?php echo $hscErr; ?></span>

			<label for="hscinstitute">Institute Name:</label>
			<textarea type="text" name="hscinstitute" id="hscinstitute" value="<?php echo $hscinstitute; ?>"></textarea>
			<span style="color:red"><?php echo $hscinstituteErr; ?></span>
</fieldset>
		</fieldset>

 	 <fieldset>
 	 	<legend><b>Account Information:</b></legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $username; ?>">
			<span style="color:red"><?php echo $usernameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			
</fieldset>
<br><br>
			<input type="submit" name="submit" value="Register">
		
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
	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>


	<p>Back to <a href="underlogin.php">Login</a></p>

</body>
</html>