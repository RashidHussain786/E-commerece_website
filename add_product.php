<?php 
  require_once 'controllers/authController.php';
  if (empty($_SESSION['adminname'])) {
      header('location:admin_login.php');
     
  }
 
 ?>
      <!-- nav -->
      <?php
   
   //include nav.php file
   include('admin_nav.php');
?>
    <!-- Header -->
  <?php
     //include add-product.php file
     include('./template/_admin_add_product.php');
  ?>

  <!-- Footer -->

  <?php
     //include footer.php file
     include('footer.php');
 ?>