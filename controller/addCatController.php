<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $catname = $_POST['c_name'];
       //crud insert
         $insert = mysqli_query($conn,"INSERT INTO category (category_name) VALUES ('$catname')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?category=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: http://localhost/gownshop8.8/gownshop8/adminindex.php#category");
         }
     
    }
        
?>