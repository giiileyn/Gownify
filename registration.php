<?php

include 'dbconnection.php';

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($con, $_POST['fname']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($con, md5($_POST['confirm_password']));
   $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
   $address = mysqli_real_escape_string($con, $_POST["complete_address"]);
   $username = mysqli_real_escape_string($con, $_POST["username"]);
   $usertype = mysqli_real_escape_string($con, $_POST["usertype"]);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;


//    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

//    $errors = array();

//    if (empty($fname) or empty($email) or empty($password) or empty($confirmpass)) 
//    {
//        array_push($errors, "All fields must be filled out!");
//    }
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
//    {
//        array_push($errors, "This email is not valid");
//    }
//    if (strlen($password) < 8) 
//    {
//        array_push($errors, "Password must be at least 8 characters long");
//    }
//    if ($password !== $confirmpass) 
//    {
//        array_push($errors, "Confirm password does not match, try again!");
//    }   

   
//    require_once "dbconnection.php";
//    $query = "SELECT * FROM users WHERE email = '$email'";
//    $result = mysqli_query($con, $query);
//    $rcount = mysqli_num_rows($result);
//    if ($rcount > 0) 
//    {
//        array_push($errors, "Email is already registered!");
//    }
//    elseif ($image_size >2000000){
//     $message[] = 'image size is too large!';
//    }
//    if (count($errors) > 0) 
//    {
//        foreach ($errors as $error) 
//        {
//            echo "<div class ='alert alert-danger'>$error</div>";
//        }
//    } 
   
//    else 
//    {
//        require_once "dbconnection.php";
//        $query = "INSERT INTO `users`( `fname`, `email`, `password`, `phone_number`, `complete_address`, `username`, `usertype`) VALUES (?,?,?,?,?,?,?)";
//        $stmt = mysqli_stmt_init($con);
//        $prestmt = mysqli_stmt_prepare($stmt, $query);
//        if ($prestmt) 
//        {
//            mysqli_stmt_bind_param($stmt, "sssssss", $fname, $email, $passwordHash, $phone, $address, $username, $usertype);
//            mysqli_stmt_execute($stmt);
//            echo "<div class ='alert alert-success'>Successfully Registered!</div>";
//        } 
//        else 
//        {
//            die("Something went wrong");
//        }
//    }
// }
   $select = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($con, "INSERT INTO `users`(fname, email, password, phone_number, complete_address, username, usertype, image) VALUES('$fname', '$email', '$pass', '$phone_number', '$address', '$username', '$usertype', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registration failed!';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="registration.css">
</head>
<body>
   
<div class="container">
<div class = "login-box">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>Sign Up</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <div class="form-group">
             <label for="fname">Full Name</label>
            <input type="text" class="form-control" name="fname" placeholder="Juan Tamad">
        </div>
        <div class="form-group">
             <label for="email">Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
        </div>
        <div class="form-group">
             <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
             <label for="password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
        </div>
        <div class="form-group">
             <label for="phone_number">Contact Number</label>
            <input type="number" class="form-control" name="phone_number" placeholder="09123456789">
        </div>
        <div class="form-group">
             <label for="complte_address">Complete Address</label>
            <input type="text" class="form-control" name="complete_address" placeholder="blk 10 lot 5 snt jude street central signal village, Taguig city">
        </div>
        <div class = "form-group">
            <label for="username">Username</label>
            <input type="text" class = "form-control" name = "username" placeholder="username" required> 
        </div>
        <div class = "form-group">
            <label for="usertype">User Type</label>
            <input type="text" class = "form-control" name = "usertype" required> 
        </div>
        <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
      <p>Already have an account? <a href="login.php"><br>login now</a></p>
   </form>

</div>
    </div>

</body>
</html>