  
  
  <?php 
  require_once 'controllers/authController.php';
  if (empty($_SESSION['adminname'])) {
      header('location:admin_login.php');
     
  }
 
 ?>
        
         <!-- nav -->
         <?php
        
     //include nav.php file
     include('admin_nav.php');
    ?>

   <!-- Header -->
   <section class="section all-products" id="products">
    <div class="top container">
          <h1>ALL PRODUCTS</h1>
          <form action ="add_product.php" method="POST">
          <button type="submit" name ="Add_product" class="login_btn"> <h3>Add Product</h3></button> 
          </form>
      </div>
      <?php 
       $limit = 7;
       
       if (isset($_GET['page'])) {
        $page =$_GET['page'];
       }else {
           $page = 1;
       }
       $offset = ($page-1)* $limit;
        $sql = "SELECT*FROM product LIMIT {$offset},{$limit}";
        $result= mysqli_query($conn, $sql) or die ("query uncessful.");
        if(mysqli_num_rows($result)>0){

        ?>
      <table>
            <thead>
               <tr>
                  <th> ID.No. </th>
                  <th> product Name</th>
                  <th> Description </th>
                  <th> Category </th>
                   <th> product Img </th>
                  <th> product Thumbnail-1</th>
                  <th> product Thumbnail-2 </th>
                  <th> product Thumbnail-3</th>
                  <th> product Thumbnail-4</th>
                  <th> price</th>
               <!--   <th> Edit</th> -->
                  <th> Delete</th>
               </tr>
            </thead>
            <tbody>
            <?php
                 while($row = mysqli_fetch_assoc($result)) {
                    
             ?>
             <tr>
             <td><?php echo $row['id']?></td>
                 <td><?php echo $row['product_name']?></td>
                 <td><?php echo $row['product_detail']?></td>
                 <td><?php echo $row['product_category']?></td>
                 <td><?php echo $row['product_image']?></td>
                 <td><?php echo $row['product_thumbnail_1']?></td>
                <td><?php echo $row['product_thumbnail_2']?></td>
                 <td><?php echo $row['product_thumbnail_3']?></td>
                 <td><?php echo $row['product_thumbnail_4']?></td>
                 <td><?php echo $row['product_price']?></td>
               <!--  <td>Null</td> -->
               <td><a href ="delete-data.php?all-product-id=<?php echo $row['id'] ?>"><i class="far fa-trash-alt"></i></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php } ?>
  </section>
   
  <section class="pagination">
  <?php 
      $sql1 =" SELECT * FROM product";
      $result1 = mysqli_query($conn, $sql1) or die('Query failed');

       if (mysqli_num_rows( $result1 ) > 0) {
           $tolal_records = mysqli_num_rows( $result1 );
          
           $tolal_page = ceil($tolal_records/$limit);
          echo ' <div class=" container">';
         
           for($i=1;  $i<= $tolal_page; $i++) {
               if($i == $page){
                $active = "active";
               }else{
                   $active = "";
               }
              echo '  <span class=" '.$active.'">
                <a href="admin_product.php?page='.$i.'">'.$i.'</a>
          </span>'; 
           }
          
           echo '</div>';
       }
       ?>
  </section>
  
      
    <!-- Footer -->

    <?php
       //include footer.php file
       include('footer.php');
   ?>
 