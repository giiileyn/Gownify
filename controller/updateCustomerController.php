<?php
    include_once "../config/dbconnect.php";

    // Check if category_id is provided
   
        $users_id = $_POST['users_id'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $complete_address = $_POST['complete_address'];

        $updatecustomer = mysqli_query($conn, "UPDATE `users` SET
        `fname`='$fname',
        `email`='$email',
        `phone_number`='$phone_number',
        `complete_address`='$complete_address'
   WHERE users_id = $users_id");
   

        if($updatecustomer)
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
