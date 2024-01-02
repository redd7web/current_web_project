<?php
ini_set("display_errors",1);
include 'includes/connect.php';
    if(isset($_POST['image_up'])){
        $target_dir = "images/";
        $target_file = $target_dir . basename( str_replace(" ","_",$_FILES["$_POST[row]_image"]["name"]));
        if(move_uploaded_file($_FILES["$_POST[row]_image"]["tmp_name"], $target_file)){
            $sql = "UPDATE items SET image = '$target_file' WHERE id = $_POST[row];";
		    $con->query($sql);
        }
    }
    
    if(isset($_POST['delete'])){
         if (file_exists($_POST['image_path'])) {
            $sql2 = "UPDATE items SET image = NULL WHERE id = $_POST[row]";
            $con->query($sql2);
            unlink($_POST['image_path']);
            echo 'File '.$_POST['image_path'].' has been deleted';
         }        
    }
    
    $resultx = mysqli_query($con,"SELECT image FROM items WHERE id=$_GET[row] AND image IS NOT NULL");
    $row = mysqli_fetch_array($resultx)
?>

<form method="POST" action="upload_image.php?row=<?php echo $_GET['row']; ?>" enctype="multipart/form-data">
    <?php if( strlen($row['image']) > 0  ){ 
        echo "<img src='$row[image]' style='width:50px;height:50px;'/><br/>";
             echo "<form action='upload_image.php?row=$_GET[row]' method='POST'>
             <input type='hidden' name='row' value='$_GET[row]'/>
             <input type='hidden' name='image_path' value='$row[image]'/>
             <input type='submit' name='delete' value='Delete'/>
             </form>";
    }else{
        ?> 
        <input name="<?php echo $_GET['row']."_image"; ?>" type="file" />
        <input type="hidden" name="row"  value="<?php echo $_GET['row']; ?>"/>
        <input type="submit" value="Upload" name="image_up"/>
             <?php
    } ?>
</form>