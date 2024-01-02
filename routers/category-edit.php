<?php
ini_set("display_errors",1);
include '../includes/connect.php';
	foreach ($_POST as $key => $value)
	{
	   if(preg_match("/[0-9]+_category_name/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE  category_list SET _category_name = '$value' WHERE id = $key;";
			$con->query($sql);
			}
		}
        
        if(preg_match("/[0-9]+_category_list_name/",$key)){
			if($value != ''){
    			$key = strtok($key, '_');
    			$value = htmlspecialchars($value);
    			$sql = "UPDATE  category_list SET category_list_name = '$value' WHERE id = $key;";
    			$con->query($sql);
			}
		}
        
        if(preg_match("/[0-9]+_category_description/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE  category_list SET category_description = '$value' WHERE id = $key;";
			$con->query($sql);
			}
		}
	}
header("location: ../admin-page.php");
?>