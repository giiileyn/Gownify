<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .displayproduct {
            display: flex;
            margin: 0px 170px;
            gap: 100px;
        }
        .displayproduct-left {
            display: flex;
            gap: 17px;
            
        }
        .displayproduct-left img {
            max-width: 500px; /* Main image width */
            height: auto;
            object-fit: cover;
            border-radius: 5px; /* Optional for rounded corners */
        }
        .displayproduct-right {
            margin: 0px 70px;
            display: flex;
            flex-direction: column;
        }
        .displayproduct-right h1 {
            color: #3d3d3d;
            font-size: 40px;
            font-weight: 700;
        }
        .displayproduct-star {
            display: flex;
            align-items: center;
            margin-top: 13px;
            gap: 5px;
            color: #1c1c1c;
            font-size: 16px;
        }
        .displayproduct-prices {
            display: flex;
            margin: 40px 0px;
            gap: 30px;
            font-size: 24px;
            font-weight: 700;
        }
        .price-old {
            color: #818181;
            text-decoration: line-through;
        }
        .price-new {
            color: #ff4141;
        }
        .size h1 {
            margin-top: 0px;
            color: #656565;
            font-size: 20px;
            font-weight: 600;
        }
        .sizes {
            display: flex;
            margin: 30px 0px;
            gap: 20px;
        }
        .sizes div {
            padding: 18px 24px;
            background: #fbfbfb;
            border: 1px solid #ebebeb;
            border-radius: 3px;
            cursor: pointer;
        }
        .displayproduct-right button {
            padding: 20px 40px;
            width: 200px;
            font-size: 16px;
            color: white;
            background: #ff4141;
            margin-bottom: 40px;
            border: none;
            outline: none;
            cursor: pointer;
        }
        .category {
            margin-top: 10px;
        }
        .category span {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <?php
    include_once "dbconnection.php";
    include_once "header1.php";
    include("sidebar_user.php");

    if (isset($_GET['id'])) {
        $productId = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT p.product_name, p.product_desc, p.price, p.product_image, c.category_name 
                  FROM product p 
                  JOIN category c ON p.category_id = c.category_id 
                  WHERE p.product_id = '$productId'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            $itemName = $product['product_name'];
            $description = $product['product_desc'];
            $price = $product['price'];
            $imagePath = $product['product_image'];
            $categoryName = $product['category_name'];
        ?>

            <div class="displayproduct mt-4">
                <div class="displayproduct-left">
                    <img src="<?php echo $imagePath; ?>" class="img-fluid" alt="<?php echo $itemName; ?>">
                </div>

                <div class="displayproduct-right">
                    <h1><?php echo $itemName; ?></h1>
                    <div class="displayproduct-star">
                        <!-- Placeholder for star ratings -->
                        ★★★★☆
                    </div>
                    <div class="displayproduct-prices">
                        <span class="price-old">₱<?php echo $price + 500; ?></span>
                        <span class="price-new">₱<?php echo $price; ?></span>
                    </div>
                    <div class="size">
                        <h1>Size</h1>
                        <div class="sizes">
                            <div>Small</div>
                            <div>Medium</div>
                            <div>Large</div>
                        </div>
                    </div>
                    <form action="manage_cart.php" method="POST">
                        <input type="hidden" name="Item_Name" value="<?php echo $itemName; ?>">
                        <input type="hidden" name="Price" value="<?php echo $price; ?>">
                        <button type="submit" name="Add_to_Cart">Add to Cart</button>
                    </form>
                    <div class="category">
                        <span>Category:</span> <?php echo $categoryName; ?>
                    </div>
                    <div>
                        <span>Description: </span> <?php echo $description; ?>
                    </div>
                    
                </div>
            </div>

        <?php
        } else {
            echo "<p>Product details not found.</p>";
        }
    } else {
        echo "<p>Invalid product ID.</p>";
    }
    ?>
</body>

</html>
