<?php

require_once 'controllers/authController.php';

 


 //if the login button is clicked

if(isset($_POST['admin_login-btn'])) {

  $username = $_POST['adminname'];
  $password = $_POST['password'];
  
 
  //ensure that form fill properly
  
  if(empty($username)) {
    $errors['adminname'] = "Admin name is required";
   }
 
   if(empty($password)) {
    $errors['password'] = "Password is required";
   }

   $sql = "select * from admin_controol where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
    while($rows =mysqli_fetch_assoc($result)) {
      if(password_verify($password, $rows['password'])) {

           $_SESSION['adminname'] = $username;
         
           header('location:admin_users.php');

      }else {
        
        $errors['db_error'] ="Database error : failed to login. PLEASE FILL CORRECT USERNAME OR PASSWORD";

      }
    }
   }

}  
?>


<img src="./images/banner2.jpg" alt="" class="hero-img" />

 <div class="centre"> 
    <h1>Log In</h1>
    <form action ="admin_login.php" method="POST">
     <div class="text_field">
  <!-- alert message -->
     <?php if(count($errors) > 0): ?>
         <div class ="alert">
         <?php foreach($errors as $error): ?>
           <li><?php echo $error;?></li>
           <?php endforeach; ?>
         </div>
         <?php endif; ?>

       <input type="text" name ="adminname" placeholder="username">
       <input type="password" name ="password" placeholder="password">
            <button type="submit" name ="admin_login-btn" class="login_btn"> <h3>Log In</h3></button>  
            <h4>WELCOME ! FILL CORRECT USERNAME AND PASSWORD.</h4>      
       </div> 
     
     </form>
  </div>
</header> 