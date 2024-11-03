<?php

    include_once "../config/dbconnect.php";
   
    $item_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT order_status from item_order where item_id='$item_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["order_status"]==0){
         $update = mysqli_query($conn,"UPDATE item_order SET order_status=1 where item_id='$item_id'");
    }
    else if($row["order_status"]==1){
         $update = mysqli_query($conn,"UPDATE item_order SET order_status=0 where item_id='$item_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>