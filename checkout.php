   
 <?php 
  require_once 'controllers/authController.php';
  if (empty($_SESSION['username'])) {
      header('location:login.php');
     
  }
 
 ?>
   
   
   <?php
       //include nav.php file
       include('nav.php');
  ?>
 
 <!-- Hero -->
    <?php
        //include indexhero.php file
        include('./template/_indexhero.php');
    ?>

    <!-- Footer -->

    <?php
       //include footer.php file
       include('footer.php');
   ?>