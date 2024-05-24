<?php
require "functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $email =addslashes($_POST['email']);
   $password =addslashes($_POST['password']);

 
   
   $query = "SELECT * FROM users WHERE email = '$email' && password = '$password' limit 1";
   $result = mysqli_query($con, $query);


if(mysqli_num_rows( $result ) >0){ 
 
  $row = mysqli_fetch_assoc( $result );
  $_SESSION["info"]=$row; // storing user data in session
   header( "Location: profile.php");
   die;

 } else {
  $error = "Invalid Email or Password!";
 }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Login - Dini</title>
    <link rel="stylesheet" href="assets/login.css">
</head>
  <body>

  <?php require "header.php";  ?>
  <div class="login_container" style="">
  
  <?php 
  if(!empty($error)){
    echo "<dic class='error'>$error</dic>";
  }
  ?>
<br><br>
  <h2 style="text-align:center;">Welcome back!</h2>
  <form method="post" >

  <input type="text" class="form-control" name="email" placeholder="Email adress" required><br>
  <input type="password" class="form-control" name="password" placeholder="Password" required><br>
  <button>Login</button>
  </form>
  </div>
  <?php  require "footer.php";?>
   
</html>