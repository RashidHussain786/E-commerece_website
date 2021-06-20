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
  <link rel="stylesheet" href="./css/style.css" />
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

              <?php if(isset($_SESSION['username'])):?>
              <li class="nav-item">
              <a  class="nav-link "><strong>Hello <?php echo $_SESSION['username']?></strong></a>
              <hr>
              </li>
              <?php endif?>
            <li class="nav-item">
              <a href="home.php" class="nav-link ">Home</a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="product.php" class="nav-link">Products</a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="#about" class="nav-link ">About</a>
              <hr>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link ">Contact</a>
              <hr>
            </li>
            <?php if(!isset($_SESSION['username'])): ?>
            <li class="nav-item">
              <a href="login.php" class="nav-link ">Account</a>
              <hr>
            </li>
              <?php endif?>
              
            <?php if(isset($_SESSION['username'])):?>
              <li>
              <a href="index.php?logout='1'" class="nav-link ">Logout</a>
              <hr>
              </li>
            <?php endif?> 
              
        
            </li>
            <li class="nav-item">
               <?php
                if (isset($_SESSION['cart-item'])){
                 $count = count($_SESSION['cart-item']);?>
                 <a href="cart.php"class="nav-link icon"><i class="fas fa-shopping-cart"></i>(<?php echo $count?>)</a>
               <?php } else{ ?>
                     <a href="cart.php"class="nav-link icon"><i class="fas fa-shopping-cart"></i>(0)</a>
                <?php }?>
            </li>
          </ul>
        </div>
        <?php
                if (isset($_SESSION['cart-item'])){
                 $count = count($_SESSION['cart-item']);?>
                 <a href="cart.php"class="cart-icon"><i class="fas fa-shopping-cart"></i>(<?php echo $count?>)</a>
               <?php } else{ ?>
                     <a href="cart.php"class="cart-icon"><i class="fas fa-shopping-cart"></i>(0)</a>
                <?php }?>
       

        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>