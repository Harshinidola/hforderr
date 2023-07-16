<?php 
 if(!isset($_SESSION['user']))
 {
   $_SESSION['no-login-message']="Please Login to access admin panel";
   header('location:'.SITEURL.'admin/login.php');
 }

?>