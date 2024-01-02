<?php
ini_set("display_errors",1);
include '../includes/connect.php';

if(isset($_POST['unlink_this'])){
    if( file_exists("../".$_POST['unlink'])  ){
        unlink("../".$_POST['unlink']);
    }
    
}


if(isset($_POST['action'])){
    // Configure upload directory and allowed file types
    $upload_dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/gallery/";
    $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
     
   
 
    // Checks if user sent an empty form 
        // Loop through each file in files[] array
        foreach ($_FILES['gallery_image']['tmp_name'] as $key => $value) {
            
            $file_tmpname = $_FILES['gallery_image']['tmp_name'][$key];
            $file_name = $_FILES['gallery_image']['name'][$key];
            $file_size = $_FILES['gallery_image']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
           
            // Set upload file path
            $filepath = $upload_dir.$file_name;
 
            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {
                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                if(file_exists($filepath)) {
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        //echo "{$file_name} successfully uploaded <br />";
                    } 
                    else {                     
                        //echo "Error uploading {$file_name} <br />"; 
                    }
                }
                else {
                 
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        //echo "{$file_name} successfully uploaded <br />";
                    }
                    else {                     
                        //echo "Error uploading {$file_name} <br />"; 
                    }
                }
            }
            else {
                 
                // If file extension not valid
                echo "Error uploading {$file_name} "; 
                echo "({$file_ext} file type is not allowed)<br / >";
            } 
        }
}
header("location: ../gallery.php");
?>