<?php
      if (isset($_GET['featured_id'])) {
        $pro_id = $_GET['featured_id'];
        $get_product = "select * from featured where id ='$pro_id'";
        $result = mysqli_query($conn, $get_product);
        $row_product = mysqli_fetch_array($result);
        $pro_img=$row_product['product_image'];
        $pro_name=$row_product['product_name'];
        $pro_detail =$row_product['product_detail'];
        $pro_price=$row_product['product_price'];
        $pro_thumnail_1=$row_product['product_thumbnail_1'];
        $pro_thumnail_2=$row_product['product_thumbnail_2'];
        $pro_thumnail_3=$row_product['product_thumbnail_3'];
        $pro_thumnail_4=$row_product['product_thumbnail_4'];

      }elseif (isset($_GET['latest_product_id'])) {
        $pro_id = $_GET['latest_product_id'];
        $get_product = "select * from latest_product where id ='$pro_id'";
        $result = mysqli_query($conn, $get_product);
        $row_product = mysqli_fetch_array($result);
        $pro_img=$row_product['product_image'];
        $pro_name=$row_product['product_name'];
        $pro_detail =$row_product['product_detail'];
        $pro_price=$row_product['product_price'];
        $pro_thumnail_1=$row_product['product_thumbnail_1'];
        $pro_thumnail_2=$row_product['product_thumbnail_2'];
        $pro_thumnail_3=$row_product['product_thumbnail_3'];
        $pro_thumnail_4=$row_product['product_thumbnail_4'];

      }elseif (isset($_GET['product_id'])) {
        $pro_id = $_GET['product_id'];
        $get_product = "select * from product where id ='$pro_id'";
        $result = mysqli_query($conn, $get_product);
        $row_product = mysqli_fetch_array($result);
        $pro_img=$row_product['product_image'];
        $pro_name=$row_product['product_name'];
        $pro_detail =$row_product['product_detail'];
        $pro_price=$row_product['product_price'];
        $pro_thumnail_1=$row_product['product_thumbnail_1'];
        $pro_thumnail_2=$row_product['product_thumbnail_2'];
        $pro_thumnail_3=$row_product['product_thumbnail_3'];
        $pro_thumnail_4=$row_product['product_thumbnail_4'];
      }
?>
<section class="section product-detail">
    <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="<?php echo  './images/'.$pro_img ?> " alt="">
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="<?php echo  './images/'.$pro_thumnail_1?>" alt="">
          </div>
          <div class="thumbnail">
            <img src="<?php echo  './images/'. $pro_thumnail_2?>" alt="">
          </div>
          <div class="thumbnail">
            <img src="<?php echo  './images/'. $pro_thumnail_3?>" alt="">
          </div>
          <div class="thumbnail">
            <img src="<?php echo  './images/'. $pro_thumnail_4?>" alt="">
          </div>
        </div>
      </div>
      <div class="right">
        <span>Home/<?php echo $pro_name ?> </span>
        <h1><?php echo $pro_name ?> </h1>
        <div class="price">Rs:<?php echo $pro_price ?></div>
        <form >
          <div>
            <select>
          
              <option value="Select size" selected disabled>Select Size</option>
              <?php 
               $get_size = "select * from size";
               $result1 = mysqli_query($conn, $get_size) or die ('query do not run');
               while($row = mysqli_fetch_assoc($result1)){
              ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['size_number']; ?></option>
              <?php } ?>
            </select>
            <span><i class='bx bx-chevron-down'></i></span>
            
          </div>
        </form>
        
        <form action="cart.php"  method="POST" class="form">
          <input type="text" name="quantity" placeholder="1">
          <button type="submit" name="Add-cart-btn" class="addCart">Add To Cart</button>
       
          <?php
          if (isset($_GET['featured_id'])) {
           $fpro_id = $_GET['featured_id'];?>
          <input type ="hidden" name ="cart-featured_id" value="<?php echo  $fpro_id ?>">
          <?php }?>
          <?php
          if (isset($_GET['latest_product_id'])) {
           $lpro_id = $_GET['latest_product_id'];?>
          <input type ="hidden" name ="cart-latest_product_id" value="<?php echo  $lpro_id ?>">
          <?php }?>
          <?php
          if (isset($_GET['product_id'])) {
          $pro_id = $_GET['product_id'];?>
          <input type ="hidden" name ="cart-product_id" value="<?php echo  $pro_id ?>">
          <?php }?>
       
        </form>
        <h3>Product Detail</h3>
        <p><?php echo $pro_detail ?></p>
        
      </div>
    </div>
  </section>