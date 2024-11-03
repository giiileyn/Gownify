<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css"></link>
    <link rel="stylesheet" href="userpanell.css">
</head>

<body>


    <?php
 session_start();
 include_once "dbconnection.php";
?>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #A94064;">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

        <div class="user-cart">
            <?php
        if(isset($_SESSION['user_id'])){
          ?>
            <a href="" style="text-decoration:none;">
                <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
            <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php 
      $count = 0;
if (isset($_SESSION['cart']))
{
  $count=count($_SESSION['cart']);
}
      ?>
            <a href="viewMyCart.php" class="btn btn-outline-warning"> My Cart (<?php echo $count; ?>)</a>
            <?php
        } ?>
        </div>

        <!-- Add the search form on the right side of the header -->
        <form class="form-inline my-2 my-lg-0 ml-3" method="GET" action="userpanel.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="searchTerm"
                required>
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
</body>

</html>
