<?php 

  function connect(){
    $conn = new mysqli("localhost", "root", "", "wtgg");
    if($conn->connect_error){
    	die("Database connection failed..." . $conn->connect_error);
    }

    return $conn;
}

?>