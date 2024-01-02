<?php
ini_set("display_errors",1);
include '../includes/connect.php';
$target_dir = $_SERVER['DOCUMENT_ROOT']."/artist/admin/images/";
$sql_entry = NULL;

    if(isset($_POST['clear_event'])){
        $con->query("TRUNCATE ev8ent");
    }

    if(isset($_POST['action'])){
        $result = $con->query("SELECT * FROM event");
        if($result->num_rows == 0){
            if( strlen(trim($_FILES['event_image']['nae']))  >0  ){
            $target_file = $target_dir . basename( str_replace(" ","_",$_FILES["event_image"]["name"]));
                if(move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)){
                     $sql_entry  = str_replace( "$_SERVER[DOCUMENT_ROOT]/artist/","",$target_file);
                }
            }
            
            if(strlen(trim($_POST['area1'])) >0  ){
                $desc = htmlspecialchars($_POST['area1']);
                $desc = stripslashes($desc);
            }
            
            if(strlen(trim($_POST['event_title'])) >0 ){
                $e_title = htmlspecialchars($_POST['event_title']);
                $e_title = stripslashes($e_title);
            }
            //echo "INSERT INTO event (id,event_desc,event_title,image) VALUES (0,'$desc','$e_title','$target_file')";
            $con->query("INSERT INTO event (id,event_desc,event_title,image) VALUES (0,'$desc','$e_title','$sql_entry')");
        }else{
            if(strlen(trim($_POST['area1'])) >0  ){
                $desc = htmlspecialchars($_POST['area1']);
                $desc = stripslashes($desc);
                //echo "UPDATE event SET event_desc ='$desc'";
                $con->query("UPDATE event SET event_desc ='$desc'");
            }
        
            if(strlen(trim($_POST['event_title'])) >0 ){
                $e_title = htmlspecialchars($_POST['event_title']);
                $e_title = stripslashes($e_title);
                //echo "UPDATE event SET event_title ='$e_title'";
                $con->query("UPDATE event SET event_title ='$e_title'");
            }
        }
        
        if( strlen(trim($_FILES['event_image']['name']))  >0  ){
            $target_file = $target_dir . basename( str_replace(" ","_",$_FILES["event_image"]["name"]));
            if(move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)){
                $sql_entry  = str_replace( "$_SERVER[DOCUMENT_ROOT]/artist/","",$target_file);
                $sql = "UPDATE event SET image = '$sql_entry'";
    		    $con->query($sql);
            }
        }        
    }
    
    
    if(isset($_POST['delete_image'])){
        $fix = str_replace("images/","","$_POST[path]");
        unlink($target_dir.$fix);
        $con->query("UPDATE event SET image =NULL");
    }
header("location: ../events.php");

?>