<?php
require "functions.php";
// Check if user is logged in and has access to this page,
// otherwise redirect them to the login page
check_login();

//post delete
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['action']) && $_POST['action']=="post_delete")
{
$id=$_GET['id']?? 0;
$user_id = $_SESSION['info']['id'];
$query="DELETE FROM posts WHERE id='$id' &&  user_id='$user_id' limit 1 ";
$result =mysqli_query($con,$query);
header("location:profile.php");
die();


}


//post edit
elseif($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['action']) && $_POST['action'] =="post_edit")
{

  $id = $_GET['id'] ?? 0;
  $user_id = $_SESSION['info']['id'];
  $post =addslashes($_POST['post']);
  
  $query = "UPDATE `posts` SET `post` = '$post' where id = '$id' && user_id = '$user_id' limit 1";
    $result = mysqli_query($con, $query);
  header( "Location: profile.php");
  die;
}


elseif($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username']))
{
//profile edit

  $username = addslashes($_POST["username"]);  //adds backslashes to special characters.
  $email =addslashes($_POST['email']);
  $password =addslashes($_POST['password']);
  $date = date('Y-m-d H:i:s');
  $id = $_SESSION['info']['id'];

    $query = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query);
  header( "Location: logout.php");
  die;
}


elseif($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['post']))
{
//add a new post

  $post = addslashes($_POST["post"]);
  $user_id =  $_SESSION['info']['id'];
  $date = date('Y-m-d H:i:s');
  
    $query = "INSERT INTO posts(user_id,post,date)
     VALUES('$user_id','$post','$date')";
    $result = mysqli_query($con, $query);

  header( "Location: profile.php");
  die;
}







?>



<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Profile - Dini</title>
    <link rel="stylesheet" href="assets/profile.css">
</head>
  <body>

  <?php require "header.php";  ?>
  <div  style="margin: auto; max-width: 600px">


  
  <?php if(!empty($_GET['action'])  && $_GET['action']== 'post_delete' && !empty($_GET['id'])) : ?> <!---this is for post delete -->

    <?php 
      $id = (int)$_GET['id'];
      $query = "SELECT * FROM posts WHERE id ='$id' limit 1";
      $result = mysqli_query($con,$query);
      ?>
    
    <?php if(mysqli_num_rows($result)>0):?>
    <?php $row = mysqli_fetch_assoc( $result ); ?>
    <br>
    <h3>Delete the post?</h3>
    <form action="" method="post" class="deleteForm" >
      <span class="post_delete" ><?= $row['post']?></span><br>
      <input type="hidden" name="action" value="post_delete"><br><br>
      <button class="deletePost">Delete post</button>
      <a href="profile.php">
<button type="button" class="cancelDelete">Cancel</button>
</a>
    </form>
    
    <?php endif;?>
  
  
    <?php elseif(!empty($_GET['action'])  && $_GET['action'] == 'post_edit' && !empty($_GET['id'])):?> <!---this is for post edit -->
    <?php 
      $id = (int)$_GET['id'];
      $query = "SELECT * FROM posts WHERE id ='$id' limit 1";
      $result = mysqli_query($con,$query);
      ?>
    
    <?php if(mysqli_num_rows($result) > 0):?>
    <?php $row = mysqli_fetch_assoc($result);?>
    <br>
    <h3>Edit the post</h3>
    <form method="post" class="post_edit"  >
      <textarea name="post" ><?= $row['post']?></textarea><br>
      <input type="hidden" name="action" value="post_edit">
      
      <button class="edit_save">Save post</button>
      <a href="profile.php">
<button type="button" class="edit_cancel">Cancel</button>
</a>
    </form>
    
    <?php endif;?>
    
    <?php elseif(!empty($_GET['action'])  && $_GET['action']== 'edit') : ?> <!-- /hadi bash ndir if i  click edit show the edit profile -->


    <h2>Edit profile</h2>
    <form  method="post" style="margin: auto;padding:10px;">

    <img src="<?php echo $_SESSION['info']['image'] ?>" alt="" style="height:100px;width:100px;object-fit:cover;margin:auto;display:block; " />
    <br>
    Image: <br><input type="file" enctype="multipart/form-data" name="image"><br>
<input  type="text" name="username" placeholder="Username" value=" <?php echo  $_SESSION['info']['username']  ?>" required ><br> <!-- value will add saved info from _SESSION                                               -->
<input type="email" name="email" placeholder="Email"value="<?php echo $_SESSION['info']['email'] ?>" required ><br>
<input type="text" name="password" placeholder="Password" required value="<?php echo $_SESSION['info']['password'] ?>"><br>
<button>Save</button>
<a href="profile.php">
<button type="button">Cancel</button>
</a>



</form>
  <?PHP else:?> <!-- this to show the normal profile if i didnt click edit  -->
  
    <h2 style="text-align:center;">User Profile</h2>
<br>
  <div class="container" style="margin:auto; max-width: width 600px; text-align: center;">
    <div>
      
        <img src="pdp.png" class="pdpImg" alt="" />
    </div>
    <b id="username">
    <?php echo  $_SESSION['info']['username']?>
    </b>
    <div>
      <?php echo $_SESSION['info']['email']  ?>
    </div>
    <a href="profile.php?action=edit">
      <button class="edit-profile">Edit profile</button>
    </a>
 
  </div>  <br>
  
  <form  method="post" class="post_create_form">
<div class="post_create">
  <h3>Create a post</h3>
  <textarea type="text" name="post" placeholder="What's on your mind?" required></textarea>
  <div class="post_create_btn">
    <button>Post</button>

  </div>
</div>
<br>

  </form>
  <hr><br>
<h4 style="margin: 0 10px;  ">Recent posts</h4>
<br>
  <!-- posts -->
  <div class="posts">
    <?php
    $id =  $_SESSION['info']['id'];
    $query = "SELECT * FROM posts WHERE user_id = '$id' ORDER BY id desc";

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

     <div class="post" >
      <div class="post_img" >
      <img src="pdp.png" alt="" >

      </div>
      <div style="flex:8;">
      <div class="post_user_info">
        <b ><?= $user_data['username']?> </b> 
        <span style="font-size: 11px;color:#808080;"><?=date("jS M, Y",strtotime($row['date']))  ?></span>
    </div>
 
      
      <?php echo nl2br($row['post']) ?> <!--we add nl2br so the post can read spaces -->

      <br><br>
      <a href="profile.php?action=post_edit&id=<?= $row['id'] ?>">   <!-- we do </?= instead of </?php echo -->
        <button class="edit">Edit</button>
      </a>
      <a href="profile.php?action=post_delete&id=<?= $row['id'] ?>">
        <button class="delete">Delete</button>
      </a>
      </div>
      
     </div>


   <?php endwhile;?>
   <?php endif;?>
    

  </div> <!--end f post-->
  




  
  <?php endif;?> <!--end if hadi if we did a codition without the {} results -->
  </div>
  <?php  require "footer.php";?>
   



    
</body>
</html>