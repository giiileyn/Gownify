<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <!-- <link rel="stylesheet" href="#"> -->
</head>

<body>
    <?php
    //include("header.php");
    // include("sidebar.php");
    include_once "dbconnection.php";
    include_once "header1.php";

    include("sidebar_user.php");

    // Fetch categories from the database
    $categoryQuery = "SELECT * FROM category";
    $categoryResult = mysqli_query($con, $categoryQuery);

    ?>

    <div class="container mt-4">
        <?php

        // Check if the search term is set
        if (isset($_GET['searchTerm'])) {
            $searchTerm = mysqli_real_escape_string($con, $_GET['searchTerm']);

            // Query to search for products based on product_id or product_name
            $query = "SELECT * FROM product WHERE product_id LIKE '%$searchTerm%' OR product_name LIKE '%$searchTerm%'";
            $result = mysqli_query($con, $query);

            // Display search results
            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Search Results:</h2>";
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemName = $row['product_name'];
                    $price = $row['price'];
                    $imagePath = $row['product_image'];
                ?>
                    <div class="col-lg-3">
                        <form action="manage_cart.php" method="POST">
                            <div class="card">
                                <img src="<?php echo $imagePath; ?>" class="card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $itemName; ?></h5>
                                    <p class="card-text">Price: ₱<?php echo $price; ?></p>
                                    <button type="submit" name="Add_to_Cart" class="btn btn-warning">Add to Cart</button>
                                    <input type="hidden" name="Item_Name" value="<?php echo $itemName; ?>">
                                    <input type="hidden" name="Price" value="<?php echo $price; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                }
                echo "</div>";
            } else {
                echo "<p>No results found.</p>";
            }
        }
        ?>
    </div>

    <div class="container mt-4">
        <?php
        while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
            $categoryId = $categoryRow['category_id'];
            $categoryName = $categoryRow['category_name'];
        ?>
            <h2 class="text-center col-lg-12 text-center border rounded bg-dark p-2 text-white my-5"><?php echo $categoryName; ?></h2>
            <div class="row">
                <?php
                // Fetch and display dresses for each category
                $dressQuery = "SELECT * FROM product WHERE category_id = '$categoryId'";
                $dressResult = mysqli_query($con, $dressQuery);

                while ($dressRow = mysqli_fetch_assoc($dressResult)) {
                    $itemName = $dressRow['product_name'];
                    $price = $dressRow['price'];
                    $imagePath = $dressRow['product_image'];
                ?>
                    <div class="col-lg-3">
                        <form action="manage_cart.php" method="POST">
                            <div class="card">
                                <img src="<?php echo $imagePath; ?>" class="card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $itemName; ?></h5>
                                    <p class="card-text">Price: ₱<?php echo $price; ?></p>
                                    <button type="submit" name="Add_to_Cart" class="btn btn-warning">Add to Cart</button>
                                    <input type="hidden" name="Item_Name" value="<?php echo $itemName; ?>">
                                    <input type="hidden" name="Price" value="<?php echo $price; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>

</body>

</html>
