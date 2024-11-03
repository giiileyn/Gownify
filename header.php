<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Index </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
</head>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gownshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Logout <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> -->

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand font-weight-bold text-dark " href="userpanel.php">Gown Shop</a> 
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link font-weight-bold text-dark" href="deleteaccount.php" ></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link font-weight-bold text-dark" href="logout_user.php">Logout </a>
      </li>
    </ul> 
      
     <!-- <form class="form-inline my-2 my-lg-0 ml-3" method="GET" action="userpanel.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="searchTerm" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
      <form class="form-inline my-2 my-lg-0" method="GET" action="userpanel.php">
        
      <input class="form-control mr-sm-2 text-center" type="text" placeholder="Search" aria-label="Search" name="searchTerm" required>
      <button class="btn btn-outline-warning my-2 my-sm-0 " type="submit">Search</button>
      
    </form>
    <div>  
      
      <?php 
      $count = 0;
if (isset($_SESSION['cart']))
{
  $count=count($_SESSION['cart']);
}

      ?>
        <a href = "mycart.php" class = "btn btn-outline-warning"> My Cart (<?php echo $count; ?>)</a>

    </div>
  <!-- <form class="form-inline my-2 my-lg-0 ml-3" method="GET" action="userpanel.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="searchTerm" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
  </div>
  </div>
</nav>
</body>
</html>