<?php 

function changepassword($username, $password){
$conn = connect();
$sql = $conn->prepare("UPDATE UNDERGRAD Set password = ? WHERE username = ?");
$sql->bind_param("ss", $password, $username);
return $sql->execute();
}
?>
 