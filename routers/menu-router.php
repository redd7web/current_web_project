<?php
include '../includes/connect.php';
$target_dir = "images/";
	foreach ($_POST as $key => $value)
	{
        if(preg_match("/[0-9]+_descr/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE items SET descr = '$value' WHERE id = $key;";
			$con->query($sql);
			}
		}
        
        if(preg_match("/[0-9]+_category/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
            $check = $con->query("SELECT ");
            
			$sql = "UPDATE items SET category = '$value' WHERE id = $key;";
			$con->query($sql);
            
            $ixa = $con->query("SELECT * FROM category_list WHERE category_name ='$value'");
            if( $ixa->num_rows == 0 ){
                $con->query("INSERT INTO category_list (id,category_name,category_list_name, category_description) VALUES (0,'$value','','') ");   
            } 
			}
		}
        
		if(preg_match("/[0-9]+_name/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE items SET name = '$value' WHERE id = $key;";
			$con->query($sql);
             
			}
		}
		if(preg_match("/[0-9]+_price/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE items SET price = $value WHERE id = $key;";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_hide/",$key)){
			if($_POST[$key] == 1){
			$key = strtok($key, '_');
			$sql = "UPDATE items SET deleted = 0 WHERE id = $key;";
			$con->query($sql);
			} else{
			$key = strtok($key, '_');
			$sql = "UPDATE items SET deleted = 1 WHERE id = $key;";
			$con->query($sql);			
			}
		}
	}
header("location: ../admin-page.php");
?>