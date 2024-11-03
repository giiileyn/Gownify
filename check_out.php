<?php
session_start();

include_once("dbconnection.php");

if (mysqli_connect_error()) {
    echo "<script>     
        alert('CONNECTION ERROR');  
        window.location.href ='viewMyCart.php';       
    </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['check_out'])) {
        // Insert into item_order without specifying customer_id
        $query = "INSERT INTO `item_order`(`users_id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
        
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            $users_id = getUserIdFromDatabase($con); // Replace this with your actual function to retrieve users_id
            
            mysqli_stmt_bind_param($stmt, "issi", $users_id, $Item_Name, $Price, $Quantity);

            foreach ($_SESSION['cart'] as $values) {
                $Item_Name = $values['Item_Name'];
                $Price = $values['Price'];
                $Quantity = $values['Quantity'];

                mysqli_stmt_execute($stmt);
            }

            unset($_SESSION['cart']);
            echo "<script>         
                alert('Order Placed');  
                window.location.href ='userpanel.php';       
            </script>";   
        } else {
            echo "<script>         
                alert('SQL query prepare ERROR');  
                window.location.href ='viewMyCart.php';       
            </script>";
        }
    }
}

// Function to retrieve users_id from the database based on your criteria
function getUserIdFromDatabase($con) {
    $user_query = "SELECT users_id FROM users WHERE usertype = 'user' LIMIT 1";
    $user_result = mysqli_query($con, $user_query);

    if ($user_row = mysqli_fetch_assoc($user_result)) {
        return $user_row['users_id'];
    }

    return null; // You might want to handle the case where users_id is not found
}
?>

  <!-- //retrieve users_id from table user para magamit naten sya wheheh not sure
            $user_query = "SELECT users_id FROM users WHERE usertype = 'user'";
            $user_result = mysqli_query($con, $user_query); -->
