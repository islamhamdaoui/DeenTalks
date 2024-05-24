<?php
require "functions.php";
// Check if user is logged in and has access to this page,
// otherwise redirect them to the login page
// check_login()
?>


<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Dini</title>
    <link rel="stylesheet" href="assets/home.css">
</head>
  <body>

    <?php require "header.php"; ?>

  <!-- posts -->
  <div class="posts">
    
    <a href="profile.php">
    <div class="add_post">
      <img src="add.png" alt="">
    Add new post</div></a>
  <h3 style="margin: 10px 0;  ">Timeline</h3>
    <?php
    // $id =  $_SESSION['info']['id'];
    $query = "SELECT * FROM posts  ORDER BY id DESC";

    $result = mysqli_query($con,$query);


      
    ?>



    <?php
   if(mysqli_num_rows($result) >  0):?> <!--//if there is data in the database then do this -->

    <?php  while($row = mysqli_fetch_assoc($result)):?>

        <?php  
        $user_id = $row['user_id']; //get the user id of who posted it
    $query = "SELECT username FROM users WHERE id='$user_id' limit 1 ";  
      $result2 = mysqli_query($con,$query);
      $user_data= mysqli_fetch_assoc($result2);
        ?>

     <div class="post">
      <div class="content">
      <div  class="post_img">
      <img src="pdp.png" alt="" >

      </div>
      <div style="flex:8;">
      <div class="post_user_info">
        <b ><?= $user_data['username']?> </b> 
        <span style="font-size: 11px;color:#808080;"><?=date("jS M, Y",strtotime($row['date']))  ?></span>
        
    </div>
 
      
      <?php echo nl2br($row['post']) ?>
      </div>
      </div>
      <hr> 
<div class="reactions">

<div class="reaction" style="display: flex; align-items:center;">
    <img src="like.png" alt="">
    <span>300</span>
    <img src="dislike.png" alt="">
  </div>
      
     </div>
     </div>

   <?php endwhile;?>
   <?php endif;?>
    
     
  </div> <!--end f post-->

    <!-- <?php require "footer.php"; ?> -->
  


</body>
</html>