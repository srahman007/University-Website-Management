<?php 
require 'DBconnection.php';
function register($fullname, $gender, $dob, $address, $email, $ssc, $sscinstitute, $hsc, $hscinstitute, $username, $password){
$conn = connect();
$sql = $conn->prepare("INSERT INTO POSTGRAD (fullname, gender, dob, address, email, ssc, sscinstitute, hsc, hscinstitute, username, password) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$sql->bind_param("sssssssssss", $fullname, $gender, $dob, $address, $email, $ssc, $sscinstitute, $hsc, $hscinstitute, $username, $password);

return $sql->execute();
}
?>
