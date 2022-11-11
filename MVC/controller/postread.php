<?php 
require 'DBconnection.php';

    function login($username , $password){
    	$conn = connect();
    	$sql = $conn -> prepare("SELECT * FROM POSTGRAD WHERE username = ? and password = ?");

    	$sql -> bind_param("ss", $username, $password);
    	$sql -> execute();
        $res = $sql->get_result();
        //$conn->close();
        return $res->num_rows === 1;

    }

    function getallusers(){
    	$conn = connect();
    	$sql = $conn -> prepare("SELECT id, username FROM POSTGRAD");
    	$sql -> execute();
        $res = $sql->get_result();
        //$conn->close();
        return $res->fetch_all(MYSQLI_ASSOC);

    }

    function getuser($username){
    	$conn = connect();
    	$sql = $conn -> prepare("SELECT id, username FROM POSTGRAD WHERE username = ?");
        $sql -> bind_param("s", $username);
    	$sql -> execute();
        $res = $sql->get_result();
        //$conn->close();
        return $res->fetch_all(MYSQLI_ASSOC);

    }

?>