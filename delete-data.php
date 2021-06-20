

 <?php
    require_once 'controllers/authController.php';
    if (empty($_SESSION['adminname'])) {
        header('location:admin_login.php');
       
    }
   
     //include nav.php file
     include('admin_nav.php');

       if(isset($_GET['lattest-id'])) {
        $pro_id = $_GET['lattest-id'];
        $get_product = "delete  from latest_product where id ='$pro_id'";
        $result = mysqli_query($conn, $get_product) or die ('query do not run');
         if($result) {
            header('location:admin_lattest_product.php');

         }else{
             echo "<p> Can't delete the data</p>";
         }
        }elseif(isset($_GET['user-id'])) {
            $pro_id = $_GET['user-id'];
            $get_product = "delete  from users where id ='$pro_id'";
            $result = mysqli_query($conn, $get_product) or die ('query do not run');
             if($result) {
                header('location:admin_users.php');
    
             }else{
                 echo "<p> Can't delete the data</p>";
             }
            }elseif(isset($_GET['all-product-id'])) {
                $pro_id = $_GET['all-product-id'];
                $get_product = "delete  from product where id ='$pro_id'";
                $result = mysqli_query($conn, $get_product) or die ('query do not run');
                 if($result) {
                    header('location:admin_product.php');
        
                 }else{
                     echo "<p> Can't delete the data</p>";
                 }
                }elseif(isset($_GET['featured-id'])) {
                    $pro_id = $_GET['featured-id'];
                    $get_product = "delete  from featured where id ='$pro_id'";
                    $result = mysqli_query($conn, $get_product) or die ('query do not run');
                     if($result) {
                        header('location:admin_featured_product.php');
            
                     }else{
                         echo "<p> Can't delete the data</p>";
                     }
                    }elseif(isset($_GET['category-id'])) {
                        $pro_id = $_GET['category-id'];
                        $get_product = "delete  from category where id ='$pro_id'";
                        $result = mysqli_query($conn, $get_product) or die ('query do not run');
                         if($result) {
                            header('location:admin_category.php');
                
                         }else{
                             echo "<p> Can't delete the data</p>";
                         }
                        }
  ?>