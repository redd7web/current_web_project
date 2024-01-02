<?php
include 'includes/connect.php';
if(isset($_POST['id'])){    
    $reslt = $con->query("DELETE FROM items WHERE id =$_POST[id]");    
}

?> 