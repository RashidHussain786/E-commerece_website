



<section class="section featured">
      <div class="title">
        <h1>Latest Products</h1>
      </div>

      <div class="product-center container">
           
      <?php 
        
        $sql = "SELECT product_name, product_price, product_image, id FROM latest_product";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          //output data of each row
        while ($row = $result -> fetch_assoc()){
          latest_product($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }
      }else {
        echo "0 result";
      }
     ?>
  
      </div>
    </section>