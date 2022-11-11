<?php 
//require 'DBconnection.php';
function removeuser($uid, $username){
$conn = connect();
$sql = $conn->prepare("DELETE FROM POSTGRAD WHERE id = ? and username = ?");
$sql->bind_param("is", $uid, $username);

return $sql->execute();
}
?>
