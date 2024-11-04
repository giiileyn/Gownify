<?php

session_start();
//session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Add_to_Cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            $itemIndex = array_search($_POST['Item_Name'], $myitems);
            
            if ($itemIndex !== false) {
                // Item already exists in the cart; increment the quantity
                $_SESSION['cart'][$itemIndex]['Quantity']++;
                echo "<script>
                    alert('Item quantity increased in cart'); 
                    window.location.href = 'userpanel.php';
                </script>";
            } else {
                // Item is not in the cart; add it
                $count = count($_SESSION['cart']); // Counter for items
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                    alert('Item added to cart'); 
                    window.location.href = 'userpanel.php';
                </script>";
            }
        } else {
            // No cart exists yet; create one
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
            echo "<script>alert('Item added to cart'); 
                window.location.href = 'userpanel.php';
            </script>";
        }
    }

    if (isset($_POST['Remove_Item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_Name'] == $_POST['Item_Name']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header("Location: viewMyCart.php");
                exit();
            }
        }
    }

    if (isset($_POST['Mod_Quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_Name'] == $_POST['Item_Name']) {
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header("Location: viewMyCart.php");
                exit();
            }
        }
    }
}
?>
