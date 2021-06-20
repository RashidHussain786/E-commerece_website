<?php 

require_once 'controllers/authController.php';

?>
 
    <img src="./images/banner2.jpg" alt="" class="hero-img" />

    <div class="centre"> 
        <h1>ADD CATEGORY</h1>
        <form action="add_category.php" method="POST" enctype="multipart/form-data" >
         <div class="text_field">
         
         <?php if(count($errors) > 0): ?>
         <div class ="alert">
         <?php foreach($errors as $error): ?>
           <li><?php echo $error;?></li>
           <?php endforeach; ?>
         </div>
         <?php endif; ?>

           
           <input type="text" name ="category"  placeholder="Category">
                <button type="submit" name="Add_category-btn" class="login_btn"> Add Category</button>   
                <h4>USE CAPITAL LATEER TO ADD THE NAME.</h4>    
           </div><br> 
         
        </form>
 
      </div>
  </header>
