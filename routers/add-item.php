<?php
ini_set("display_errors",1);
include '../includes/connect.php';

$name = $_POST['name'];
$descr = $_POST['descr'];
$price = $_POST['price'];
$categ = $_POST['category'];
$target_dir = $_SERVER['DOCUMENT_ROOT']."/artist/admin/images/";
$sql_name = NULL;
if(strlen(trim($_FILES["image_up"]["name"])) >0  ){
    $target_file = $target_dir . basename( str_replace(" ","_",$_FILES["image_up"]["name"]));
    $sql_name = 'images/'.str_replace(" ","_",$_FILES["image_up"]["name"]);
    move_uploaded_file($_FILES["image_up"]["tmp_name"], $target_file);
}
$sql2 = "SELECT DISTINCT category FROM items  WHERE category = '$categ'";
$res = $con->query($sql2);
$rows = mysqli_num_rows($res);
if( $rows == 0 ){
    $sql3= "INSERT INTO category_list (id,category_name,category_list_name,category_description) VALUES (0,'$categ','','')";
    $con->query($sql3);
}

if(strlen($sql_name) >0){
    $sql = "INSERT INTO items (name,descr, price,category,deleted,image) VALUES ('$name','$descr', $price,'$categ',0,'$sql_name')";
}else{
    $sql = "INSERT INTO items (name,descr, price,category,deleted,image) VALUES ('$name','$descr', $price,'$categ',0,'')";
}

$rez = $con->query($sql);

header("location: ../admin-page.php");
?>