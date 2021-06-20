


<?php
  
           // featured product

function featured($productname, $productprice, $productimg,$productid){?>

    <div class="product">
    <div class="product-header">
      <img src=" <?php echo './images/'.$productimg?>" alt="">
      <ul class="icons">
      <span><i class="far fa-heart"></i></span>
      <span name="add"><a href="cart.php?cart-featured_id=<?php echo $productid?>"><i class="fas fa-shopping-cart"></i></a></span>
      <span><i class="fas fa-search"></i></span>         
      </ul>
    </div>
    <div class="product-footer">
    <a href='product-details.php?featured_id=<?php echo $productid ?>' >
    <h3> <?php echo $productname?></h3>
  </a>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star"></i>
      </div>
      <h4 class="price">Rs:<?php echo $productprice ?></h4>
    </div>
  </div>
  
  <?php
}  
?>  
 
<?php
                    //lattest product
function latest_product($productname, $productprice, $productimg,$productid){?>

  <div class="product">
  <div class="product-header">
    <img src=" <?php echo'./images/'. $productimg?>" alt="">
    <ul class="icons">
    <span><i class="far fa-heart"></i></span>
    <span name="add"><a href="cart.php?cart-latest_product_id=<?php echo $productid?>"><i class="fas fa-shopping-cart"></i></a></span>
    <input type='hidden' name='product_id' value=<?php echo $productid?>>
    <span><i class="fas fa-search"></i></span>
             
    </ul>
  </div>
  <div class="product-footer">
  <a href='product-details.php?latest_product_id=<?php echo $productid ?>' >
  <h3> <?php echo $productname?></h3>
 </a>
    <div class="rating">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
    </div>
    <h4 class="price">Rs:<?php echo $productprice ?></h4>
  </div>
</div>

<?php
}
?>


<?php
                    //All product
function Allproduct($productname, $productprice, $productimg,$productid){?>

  <div class="product">
  <div class="product-header">
    <img src=" <?php echo'./images/'. $productimg?>" alt="">
    <ul class="icons">
    <span><i class="far fa-heart"></i></span>
    <span name="add"><a href="cart.php?cart-product_id=<?php echo $productid?>"><i class="fas fa-shopping-cart"></i></a></span>
    <input type='hidden' name='product_id' value=<?php echo $productid?>>
    <span><i class="fas fa-search"></i></span>      
    </ul>
  </div>
  <div class="product-footer">
  <a href='product-details.php?product_id=<?php echo $productid ?>' >
  <h3> <?php echo $productname?></h3>
 </a>
    <div class="rating">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
    </div>
    <h4 class="price">Rs:<?php echo $productprice ?></h4>
  </div>
</div>

<?php
}
?>

<?php 
//add  to cart items
 $Delivery_charege=0;
 $sub_total=0;
 $total_prices=0;
 $total_quantity=0;
  ?>
  <?php
   if(isset($_POST['Add-cart-btn'])) {
          if(isset($_POST['quantity'])) {
            $quantity = $_POST['quantity'];
           }else{
              $quantity = 1;

           }
   
     if (isset($_POST['cart-featured_id'])) {
      $pro_id = $_POST['cart-featured_id'];
      $get_product = "select * from featured where id ='$pro_id'";
      $result = mysqli_query($conn, $get_product);
     
     }elseif
     (isset($_POST['cart-latest_product_id'])) {
      $pro_id = $_POST['cart-latest_product_id'];
      $get_product = "select * from latest_product where id ='$pro_id'";
        $result = mysqli_query($conn, $get_product);
       
     }elseif
     (isset($_POST['cart-product_id'])) {
       $pro_id = $_POST['cart-product_id'];
       $get_product = "select * from product where id ='$pro_id'";
       $result = mysqli_query($conn, $get_product);
      
     }
     
   
     while($row_product =mysqli_fetch_array($result)){
       $itemarray = [
        $row_product['id'] => [
           'name'=> $row_product['product_name'],
           'cart-id' =>  $row_product['id'],
           'quantity' => $_POST['quantity']=1,
           'price'=> $row_product['product_price'],
           'image'=> $row_product['product_image']
         ]
         ];
        if(!empty($_SESSION['cart-item'])) {
          if(in_array( $row_product['id'],array_keys($_SESSION['cart-item']))) {
            echo "<script> alert('Product is already in cart!')</script>";
            echo "<script> windows.location ='product-details.php'</script>"; 
         }else{
           $_SESSION['cart-item'] += $itemarray ;
         }
      }else{
        $_SESSION['cart-item'] = $itemarray;   
         }
     }
    } 
     

 ?>