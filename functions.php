<?php
require "connection.php";


//to check  if the user is logged in or not
function check_login(){
  if(empty($_SESSION['info'])){
    header('location: login.php');
    die;
  }
}