<?php 

function changepassword($username, $password){
$conn = connect();
$sql = $conn->prepare("UPDATE POSTGRAD Set password = ? WHERE username = ?");
$sql->bind_param("ss", $password, $username);
return $sql->execute();
}

?>
