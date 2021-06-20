
<div class="container-md cart">
    <table>
      <tr>
       
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr> 
      <?php
         require_once 'controllers/function.php';
        if(isset($_SESSION['cart-item'])&& !empty($_SESSION['cart-item'])){
        foreach($_SESSION['cart-item'] as $item) {
         $item_price = $item['quantity']*$item['price'];
      ?>
           <tr>
              
              <td>
              <div class="cart-info">
              <img src="./images/<?=$item['image'] ?>" alt="">
              <div>
              <p><strong><?=$item['name']   ?></strong></p>
              <span><strong>Price: Rs:<?=$item['price'] ?></strong></span>
              <br />
              <option ><strong>Size-Number:30</strong></option>
             
              <a href="delete-from-cart.php?id=<?php echo $item['cart-id']?>">remove</a>
              </div>
              </div>
              </td>
              <td><strong><?= $item['quantity']?></strong></td>
              <td><strong>Rs:<?=$item_price ?></strong></td>
          </tr>  
   <?php } 
   
    ?>
    </table>


    <div class="total-price">
      <table>

      <?php
      foreach($_SESSION['cart-item'] as $item) {
      $total_quantity  += $item["quantity"];
      $sub_total  += ($item["quantity"]*$item["price"]);
      $total_prices = $sub_total+$Delivery_charege;
        } 
        }
      
      ?>

        <tr>
          <td>Subtotal</td>
          <td><strong>Rs:<?php echo $sub_total?></strong></td>
        </tr>
        <tr>
          <td>Delivery Charge</td>
          <td><strong>Rs:<?php echo $Delivery_charege?></strong></td>
        </tr>
        <tr>
          <td>Total</td>
          <td><strong>Rs:<?php echo $total_prices?></strong></td>
        </tr>
       
      </table>
     
      <a href="checkout.php" class="checkout btn">Proceed To Checkout</a>

    </div>

  </div>

  