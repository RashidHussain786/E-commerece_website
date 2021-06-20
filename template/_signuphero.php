<?php 

require_once 'controllers/authController.php';

?>

<img src="./images/banner2.jpg" alt="" class="hero-img" />

    <div class="centre"> 
        <h1>Sign Up Form</h1>
        <form action="signup.php"method="POST">
         <div class="text_field">
         
         <?php if(count($errors) > 0): ?>
         <div class ="alert">
         <?php foreach($errors as $error): ?>
           <li><?php echo $error;?></li>
           <?php endforeach; ?>
         </div>
         <?php endif; ?>


           <input type="text" name="username" value="<?php echo $username;?>" placeholder="username">
           <input type="email" name="email" value="<?php echo $email;?>"placeholder="Email Address">
           <input type="password" name="password" placeholder="password">
           <input type="conform_password" name="conform_password"  placeholder="conform password">
                <button type="submit" name="signup-btn" class="login_btn"> Sign Up </button>   
                <h4>By signing up, you agree to our Terms , Data Policy and Cookies Policy .</h4>    
           </div><br> 
           <p>Have an account? <a href="login.php" class="lg">Log In</a></p>
        </form>
 
      </div>
  </header>