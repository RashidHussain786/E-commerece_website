<?php
     //include nav.php file
     include('nav.php');
  ?>
  
 
 <?php
              if(!empty($_SESSION['cart-item'])){
                foreach($_SESSION['cart-item'] as $key =>$value){
                  if($_GET['id'] == $key){
                    unset($_SESSION['cart-item'][$key]);
                    header('location:cart.php');
                  }
                  if(empty($_SESSION['cart-item'])){
                    unset($_SESSION['cart-item']);
                    header('location:cart.php');
                  }
                }
              }
              ?>