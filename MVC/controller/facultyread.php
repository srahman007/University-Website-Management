<?php 
require 'DBconnection.php';

    function login($username , $password){
    	$conn = connect();
    	$sql = $conn -> prepare("SELECT * FROM UNDERGRAD WHERE username = ? and password = ?");

    	$sql -> bind_param("ss", $username, $password);
    	$sql -> execute();
        $res = $sql->get_result();
        //$conn->close();
        return $res->num_rows === 1;

    }

    function getallusers(){
    	$conn = connect();
    	$sql = $conn -> prepare("SELECT id, username FROM UNDERGRAD");
    	$sql -> execute();
        $res = $sql->get_result();
        //$conn->close();
        return $res->fetch_all(MYSQLI_ASSOC);

    }

    function getuser($username){
    	$conn = connect();
    	$sql = $conn -> prepare("SELECT id, username FROM UNDERGRAD WHERE username = ?");
        $sql -> bind_param("s", $username);
    	$sql -> execute();
        $res = $sql->get_result();
        //$conn->close();
        return $res->fetch_all(MYSQLI_ASSOC);

    }

?>