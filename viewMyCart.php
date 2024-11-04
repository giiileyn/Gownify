<?php
include_once "header1.php";
include_once "sidebar_user.php";
include_once "config/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="userpanell.css">
</head>

<body>
    <div class="container">
        <h2>My Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Item id</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Remove Order</th>
                </tr>
            </thead>

            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $sr = 1;
                foreach ($_SESSION['cart'] as $key => $value) {
                    echo "
                        <tr>
                            <td>$sr</td>
                            <td>{$value['Item_Name']}</td>
                            <td>{$value['Price']}<input type='hidden' class='iprice' value='{$value['Price']}'></td>
                            <td>
                                <form action='manage_cart.php' method='POST'>
                                    <input class='text-center iquan' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='{$value['Quantity']}' min='1' max='50'>
                                    <input type='hidden' name='Item_Name' value='{$value['Item_Name']}'>
                                </form>
                            </td>
                            <td class='itot'></td>
                            <td>
                                <form action='manage_cart.php' method='POST'>
                                    <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove Order</button>
                                    <input type='hidden' name='Item_Name' value='{$value['Item_Name']}'>
                                </form>
                            </td>
                        </tr>
                    ";
                    $sr++;
                }
            } else {
                echo "<tr><td colspan='6'>Your cart is empty</td></tr>";
            }
            ?>
        </table>

        <?php 
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        ?>
            <div class="border bg-light rounded p-4">
                <h4>Total Cost:</h4>
                <h5 class="text-right" id="supertot">0</h5>
                <form action="check_out.php" method="POST">
                    <button class="yellow-button" name="check_out">Check Out</button>
                </form>
            </div>
        <?php
        }
        ?>
    </div>

    <script>
        var st = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquan = document.getElementsByClassName('iquan');
        var itot = document.getElementsByClassName('itot');
        var supertot = document.getElementById('supertot');

        function totcost() {
            st = 0;
            for (i = 0; i < iprice.length; i++) {
                var total = (iprice[i].value) * (iquan[i].value);
                itot[i].innerText = total.toFixed(2); // Display total per item
                st += total; // Accumulate the total cost
            }
            supertot.innerText = st.toFixed(2); // Display total cost
        }

        window.onload = totcost;

        Array.from(iquan).forEach(function (element) {
            element.addEventListener('input', function () {
                totcost();
            });
        });
    </script>

    <!-- Include necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
</body>

</html>
