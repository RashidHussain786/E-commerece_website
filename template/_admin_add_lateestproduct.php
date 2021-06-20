<?php 

require_once 'controllers/authController.php';

?>
 
    <img src="./images/banner2.jpg" alt="" class="hero-img" />

    <div class="centre"> 
        <h1>ADD LATTEST PRODUCT</h1>
        <form action="add_latestproduct.php" method="POST" enctype="multipart/form-data" >
         <div class="text_field">
         
         <?php if(count($errors) > 0): ?>
         <div class ="alert">
         <?php foreach($errors as $error): ?>
           <li><?php echo $error;?></li>
           <?php endforeach; ?>
         </div>
         <?php endif; ?>

           <input type="text" name ="productname"  placeholder="productname">
           <input type="text" name ="description"  placeholder="Description">
           <input type="number" name="price"  placeholder="price">
           <input  type="file" title ="product Image" name="productimag"  placeholder="product Image">
           <input type="file" title ="Thumbnail Image 1" name ="thumbnail1"  placeholder="Thumbnail Image 1">
           <input type="file" title ="Thumbnail Image 2" name ="thumbnail2"  placeholder="Thumbnail Image 2">
           <input type="file" title ="Thumbnail Image 3" name ="thumbnail3"  placeholder="Thumbnail Image 3">
           <input type="file" title ="Thumbnail Image 4" name ="thumbnail4"  placeholder="Thumbnail Image 4">
                <button type="submit" name="Add_latestproduct-btn" class="login_btn"> Add Product</button>   
                <h4>By signing up, you agree to our Terms , Data Policy and Cookies Policy .</h4>    
           </div><br> 
         
        </form>
 
      </div>
  </header>
