<?php

    include_once "../config/dbconnect.php";
    
    $item_id=$_POST['record'];
    $query="DELETE FROM item_order where item_id='$item_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Order Details Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>