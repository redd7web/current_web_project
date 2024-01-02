<?php

include 'includes/connect.php';
if(isset($_POST['id'])){
    if( $con->query("DELETE FROM category_list WHERE id = $_POST[id]")  ){
        $con->query("UPDATE items SET category=NULL WHERE category = '$_POST[categ]");
    }
  
}

?>