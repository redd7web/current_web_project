<?php
session_start();
$servername = "mariadb-131.wc1.lan3.stabletransit.com";
$server_user = "702797_artist";
$server_pass = "Pass1234";
$dbname = "702797_artist";
if(isset($_SESSION['name'])){
   $name = $_SESSION['name']; 
}

if(isset($_SESSION['role'])){
   $role = $_SESSION['role']; 
}

$con = new mysqli($servername, $server_user, $server_pass, $dbname);
?>