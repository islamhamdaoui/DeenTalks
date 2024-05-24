<?php
require "functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $username = addslashes($_POST["username"]);  //adds backslashes to special characters.
   $email =addslashes($_POST['email']);
   $password =addslashes($_POST['password']);
   $date = date('Y-m-d H:i:s');

  $query = "INSERT INTO users(username,email,password,date) VALUES('$username','$email','$password','$date')";
   $result=  mysqli_query($con,$query);
   header( "Location: login.php");
   die;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Signup - Dini</title>
    <link rel="stylesheet" href="assets/signup.css">
</head>
  <body>

  <?php require "header.php";  ?>
  <div class="signup_container"">
  <br><br>
  <h2 style="text-align:center;">Signup</h2>
  <form  method="post" >

  <input type="text" name="username" placeholder="Username" required ><br>
  <input type="email" name="email" placeholder="Email" required ><br>
  <input type="password" name="password" placeholder="Password" required ><br>
  <button>Signup</button>
  </form>
  </div>
  <?php  require "footer.php";?>
   

</body>
</html>