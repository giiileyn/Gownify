<?php
    include_once "../config/dbconnect.php";

    // Check if category_id is provided
   
        $category_id = $_POST['category_id'];
        $c_name = $_POST['c_name'];

        $updatecategory = mysqli_query($conn, "UPDATE category SET
        category_name = '$c_name'
        WHERE category_id = $category_id");

        if($updatecategory)
        {
            echo"true";
        }

        // // Use prepared statements to prevent SQL injection
        // $updatecategory = mysqli_prepare($conn, "UPDATE category SET category_name = ? WHERE category_id = ?");
        // mysqli_stmt_bind_param($updatecategory, "si", $category_name, $category_id);
        // $result = mysqli_stmt_execute($updatecategory);

        // if ($result) {
        //     echo "true";
        // } else {
        //     echo "Error updating category name: " . mysqli_error($conn);
        // }

        // // Close the statement
        // mysqli_stmt_close($updatecategory);
   
?>
