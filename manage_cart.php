<?php

session_start();
//session_destroy();
if ($_SERVER ["REQUEST_METHOD"] == "POST")
{
 if (isset($_POST['Add_to_Cart']))
 {
    if (isset($_SESSION['cart']))
    {
         $myitems = array_column($_SESSION['cart'],'Item_Name');
        if (in_array($_POST['Item_Name'],$myitems))
        {
         echo "<script>
         alert('Item already in cart'); 
         window.location.href = 'userpanel.php';
                </script>";
        }
        else
        {

        $count = count ($_SESSION['cart']);//counter ng item
        $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'],'Price' =>$_POST['Price'], 'Quantity' =>1 );
        echo "<script>
            alert('Item added in cart'); 
            window.location.href = 'userpanel.php';
            </script>";
        }
    }
    else
    {
        $_SESSION['cart'][0] = array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'], 'Quantity'=>1);
               echo "<script>alert('Item already in cart'); 
               window.location.href = 'userpanel.php';
               </script>";
    }
 }
 if (isset($_POST['Remove_Item']))
 {
    foreach($_SESSION['cart'] as $key=>$value)
    {
        if($value['Item_Name']==$_POST['Item_Name'])
        {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            header("Location: viewMyCart.php");
            exit();
        }

    }
 }


if(isset($_POST['Mod_Quantity']))
{
    foreach($_SESSION['cart'] as $key=>$value)
    {
        if($value['Item_Name']==$_POST['Item_Name'])
        {
            $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
            $_SESSION['cart']=array_values($_SESSION['cart']);
            header("Location: viewMyCart.php");
            exit();
            
        }

    }
}
}
// } elseif (isset($_POST['Mod_Quantity']) && isset($_POST['Item_Name'])) {
//     foreach ($_SESSION['cart'] as $key => &$value) {
//         if ($value['Item_Name'] == $_POST['Item_Name']) {
//             $value['Quantity'] = $_POST['Mod_Quantity'];
//             // Optionally, you can update the Price as well if needed
//             // $value['Price'] = $_POST['Mod_Price'];
//             // print_r($_SESSION['cart']); // This will display the updated cart in an array format
//             // You can optionally redirect here if needed
//             // echo "<script>window.location.href ='mycart.php';</script>";
//         }
//     }
// }

// // if (isset($_POST['Mod_Quantity']) && isset($_POST['Item_Name'])) {
// //     foreach ($_SESSION['cart'] as $key => $value) {
// //         if ($value['Item_Name'] == $_POST['Item_Name']) {
// //             $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
// //             print_r($_SESSION['cart']); 
// //             echo "<script>window.location.href ='mycart.php';</script>";
// //             // You can optionally redirect here if needed
// //             // echo "<script>window.location.href ='mycart.php';</script>";
// //         }
        
// //     }
// // }

 
// //  }


?>




