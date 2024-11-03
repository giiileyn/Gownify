<?php

    include_once "../config/dbconnect.php";
    
    $users_id=$_POST['record'];
    $query="DELETE FROM users where users_id='$users_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Customer infos Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>