  <?php  require_once 'controllers/function.php';?>
  
  
  <section class="section all-products" id="products">
      <div class="top container">
          <h1>All Products</h1>
          <form>
              <select>
                  <option value="1">Defualt Sorting</option>
                  <option value="2">Sort By Price</option>
                  <option value="3">Sort By Popularity</option>
                  <option value="4">Sort By Sale</option>
                  <option value="5">Sort By Rating</option>
              </select>
              <span><i class='bx bx-chevron-down'></i></span>
          </form>
      </div>

      <div class="product-center container">
            <?php 
           $limit = 12;
      
           if (isset($_GET['productpage'])) {
            $page =$_GET['productpage'];
           }else {
               $page = 1;
           }
           $offset = ($page-1)* $limit;
        $sql = "SELECT product_name, product_price, product_image, id FROM product  LIMIT {$offset},{$limit}";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          //output data of each row
        while ($row = $result -> fetch_assoc()) {
          Allproduct($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }
      }else {
        echo "0 result";
      }
     ?>
      </div>
  </section>

  <section class="pagination">
  <?php 
      $sql1 =" SELECT * FROM product";
      $result1 = mysqli_query($conn, $sql1) or die('Query failed');

       if (mysqli_num_rows( $result1 ) > 0) {
           $tolal_records = mysqli_num_rows( $result1 );
          
           $tolal_page = ceil($tolal_records/$limit);
          echo ' <div class=" container">';
         
           for($i=1;  $i<=$tolal_page; $i++) {
               if($i == $page){
                $active = "active";
               }else{
                   $active = "";
               }
              echo '  <span class=" '.$active.'">
                <a href="product.php?productpage='.$i.'">'.$i.'</a>
          </span>'; 
           }
          
           echo '</div>';
       }
       ?>
  </section>