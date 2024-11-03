<?php
include_once "dbconnection.php";
session_start();

if(isset($_POST['login'])){

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = mysqli_real_escape_string($con, md5($_POST['password'])); // Assuming you are storing password as MD5 hash

   $usertype = mysqli_real_escape_string($con, $_POST['usertype']);

   $select = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' AND usertype = '$usertype'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['users_id'];

      if($usertype == 'user') {
         header('location:userpanel.php');
      } elseif($usertype == 'admin') {
         header('location:adminindex.php');
      } else {
         $message[] = 'Invalid user type';
      }
   } else {
      $message[] = 'Incorrect email, password, or user type!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="logstyle.css">
</head>
<body>

   <div class="container">
      <div class="login-box">
         <h1>Login Form</h1>
         <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
         ?>
         <form action="" method="POST">
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" placeholder="name@gmail.com" name="email" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" placeholder="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="usertype">User Type</label>
               <input type="text" placeholder="admin or user" name="usertype" class="form-control" required>
            </div>
            <div class="form-group">
               <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
         </form>
         <p>Don't have an account?<br><a href="registration.php">Sign up</a></p>
      </div>
   </div>

</body>
</html>