<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Dini</title>

</head>
<body>
    

   
  <header>
  <!-- i added the php so some buttons
   will only show when session is
   logged in and else will show other buttons -->
<style>
    .fa-solid{
        font-size:2rem;
        
    }
   
</style>
    <div><a href="index.php">Home</a></div>
    <div><a href="profile.php">Profile</a></div>
 <?php if(empty($_SESSION['info'])): ?><!-- to hide buttons if not logined and saved in session -->
    <div><a href="login.php">Login</a></div>
    <div><a href="signup.php">Signup</a></div>
<?php  else: ?>
    <div><a href="logout.php">Logout</a></div>

    <?php  endif; ?>

</header>



  <style>

    body {
        background-color: #F0F2F5;
        font-family: tahoma;
       
    }
    a{
        text-decoration: none;
      color: black;
    }

    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }   

    header {
        display: flex;
        background-color: white;
        /* background-color: #766ecc; */
        justify-content: center;
        align-items: center;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
    }

    header div {
        padding: 20px;
    }
    footer {
        padding: 20px;
        text-align: center;
        background-color: #f6f6f6;
    }

    input {
        margin: 4px;
        padding: 8px;
        width: 100%;
    }
   

    button {
        padding: 10px;
        cursor: pointer;
    }
  </style>
</body>
</html>