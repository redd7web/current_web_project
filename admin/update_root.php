<?php
include 'includes/connect.php';
$password = "artist2024";
$salt = sha1(md5($password)).'k32duem01vZsQ2lB8g0s'; 
$password = md5($password.$salt);
echo "$password";


$con->query("UPDATE users SET password='$password' WHERE  username ='mark'");

?>