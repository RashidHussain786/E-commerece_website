<?php

require_once 'controllers/authController.php';

 if(isset($_SESSION['username'])) {
  header('location:index.php');
 }
?>


<img src="./images/banner2.jpg" alt="" class="hero-img" />

 <div class="centre"> 
    <h1>Log In</h1>
    <form action ="login.php" method="POST">
     <div class="text_field">
  <!-- alert message -->
     <?php if(count($errors) > 0): ?>
         <div class ="alert">
         <?php foreach($errors as $error): ?>
           <li><?php echo $error;?></li>
           <?php endforeach; ?>
         </div>
         <?php endif; ?>

       <input type="text" name ="username" placeholder="username">
       <input type="password" name ="password" placeholder="password">
            <button type="submit" name ="login-btn" class="login_btn"> <h3>Log In</h3></button>       
       </div> 
       <p>Don't have an account? <a href="signup.php" class="lg">Sign Up</a> </p>
     </form>
  </div>
</header> 