<?php
   require_once 'controllers/authController.php';

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico.ico" type="image/x-icon">
 
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/admin_style.css" />
  <title>Ahmad Hussain-Shop</title>
</head>

<body>
  <!-- Header -->
  <header id="home" class="header">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>Ahmad Hussain</h1>
          <hr>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Ahmad Hussain</h1>
              <hr>
            </div>
            <div class="close">
              <i class="far fa-times-circle"></i>
            </div>
          </div> 

          <ul class="nav-list">

              <?php if(isset($_SESSION['adminname'])):?>
              <li class="nav-item">
              <a  class="nav-link "><strong>Hello <?php echo $_SESSION['adminname']?></strong></a>
              <hr>
              </li>
              <?php endif?>
           
            <li class="nav-item">
              <a href="admin_product.php" class="nav-link">Products</a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="admin_featured_product.php" class="nav-link">Featured Product</a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="admin_lattest_product.php" class="nav-link">Lattest Product</a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="admin_category.php" class="nav-link ">Category</a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="admin_users.php" class="nav-link ">All User</a>
              <hr>
            </li>
         
            <?php if(isset($_SESSION['adminname'])):?>
              <li>
              <a href="admin_login.php?adminlogout='1'" class="nav-link ">Logout</a>
              <hr>
              </li>
            <?php endif?> 
              
        
           
          </ul>
        </div>


        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>