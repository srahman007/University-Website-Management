<?php define("filepath", "../model/undergraduationsection.JSON");
	$courseA =$courseB = $courseC = $courseD = "";
	$isValid = true;

	$courseAErr = $courseBErr = $courseCErr = $courseDErr =  "";

	$successfulMessage = $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		
		$courseA = $_POST['courseA'];
		$courseB = $_POST['courseB'];
		$courseC = $_POST['courseC'];
        $courseD = $_POST['courseD'];

		if(empty($courseA)) {
			$courseAErr = "Course section can not be empty!";
			$isValid = false;
		}
		if(empty($courseB)) {
			$courseBErr = "Course section can not be empty!";
			$isValid = false;
		}
		if(empty($courseC)) {
			$courseCErr = "Course section can not be empty!";
			$isValid = false;
		}
		if(empty($courseD)) {
			$courseDErr = "Course section can not be empty!";
			$isValid = false;
		}
		
		if($isValid) {
			$courseA = test_input($courseA);
            $courseB  = test_input($courseB);
            $courseC      = test_input($courseC);
            $courseD  = test_input($courseD);

			$data[] = array('courseA' => $courseA,'courseB' => $courseB, 'courseC' => $courseC ,'courseD' => $courseD);
			 $data_encode = json_encode($data);
			$result1 = write($data_encode);
			if($result1) {
				$successfulMessage = "Sections taken successfully.";
			}
			else {
				$errorMessage = "Error while taking section.";
			}
		}
	}
	function write($content) {
			$resource = fopen(filepath, "a");
			$fw = fwrite($resource, $content . "\n");
			fclose($resource);
			return $fw;
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
	<title>Section Selection</title>
</head>
<body style="background-color: #EDBB99">
<h1><p align="left">Available Courses:</p></h1>
	<h2><p align="right">Duration: 13-17August 2021<hr>
        	<a href="facultylogout.php">Logout</a></p></h2><br>
	<marquee direction="right"  bgcolor="#F7DC6F  ">
<h1><a href="#" style="color:black";>Course sections are given below</a></h1></marquee>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        	<br><br><br>
    
        	
            <h3>Web-technology:</h3><br>
			<input type="checkbox" name="courseA" id="courseA" value="Section A">
			<label for="courseA">Section A</label><br>
			<input type="checkbox" name="courseA" id="courseA" value="Section C">
			<label for="courseA">Section C</label><br>
			<input type="checkbox" name="courseA" id="courseA" value="Section G">
			<label for="courseA">Section G</label><br>
			<span style="color:red"><?php echo $courseAErr; ?></span><hr>

			<br>

			<h3>Compiler Design:</h3><br>
			<input type="checkbox" name="courseB" id="courseB" value="Section B">
			<label for="courseB">Section B</label><br>
			<input type="checkbox" name="courseB" id="courseB" value="Section C">
			<label for="courseB">Section C</label><br>
			<input type="checkbox" name="courseB" id="courseB" value="Section F">
			<label for="courseB">Section F</label><br>
			<input type="checkbox" name="courseB" id="courseB" value="Section H">
			<label for="courseB">Section H</label><br>
			<span style="color:red"><?php echo $courseBErr; ?></span><hr>

			<br>

			<h3>Theory of Computation:</h3><br>
			<input type="checkbox" name="courseC" id="courseC" value="Section B">
			<label for="courseC">Section B</label><br>
			<input type="checkbox" name="courseC" id="courseC" value="Section D">
			<label for="courseC">Section D</label><br>
			<input type="checkbox" name="courseC"  id="courseC" value="Section G">
			<label for="courseC">Section G</label><br>
			<input type="checkbox" name="courseC"  id="courseC" value="Section L">
			<label for="courseC">Section L</label><br>
			<span style="color:red"><?php echo $courseCErr; ?></span><hr>

			<br>

			<h3>Artificial Intelligency:</h3><br>
			<input type="checkbox" name="courseD" id="courseD" value="Section D">
			<label for="courseD">Section D</label><br>
			<input type="checkbox" name="courseD" id="courseD" value="Section G">
			<label for="courseD">Section G</label><br>
			<input type="checkbox" name="courseD" id="courseD" value="Section I">
			<label for="courseD">Section I</label><br>
			<input type="checkbox" name="courseD" id="courseD" value="Section L">
			<label for="courseD">Section L</label><br>
			<span style="color:red"><?php echo $courseDErr; ?></span><hr>
			<br><br>
     
            <input type="submit" name="submit" value="Register">
            <br>
       

        </form>
        <p style="color:green;"><?php echo $successfulMessage; ?></p>
	    <p style="color:red;"><?php echo $errorMessage; ?></p>

</body>
</html>