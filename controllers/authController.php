<?php 

session_start();
$username = "";
$email = "";
$errors = array();


//connect to the database
require 'config/db.php';


//if the signup button is clicked
  if(isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conform_password = $_POST['conform_password'];

    //ensure that form fill properly
    
    if(empty($username)) {
      $errors['username'] = "Username is required";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid";
    }
    if(empty($email)) {
      $errors['email'] = "Email is required";
    }
     if(empty($password)) {
      $errors['password'] = "Password is required";
    }

    if($password != $conform_password) {
      $errors ['password'] = "The two password do not match";
    }

    $emailQuery = "SELECT * FROM users WHERE email =? limit 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt ->bind_param('s', $email);
    $stmt ->execute();
    $stmt = $stmt->get_result();
    $userCount = $stmt ->num_rows;
    $stmt ->close();

    if($userCount > 0) {
      $errors['email'] = "Email already exists";
    }

    //if there are no erros ,save users to data base
    if(count($errors)== 0) {
      $hash= password_hash($password, PASSWORD_DEFAULT);
      $token = bin2hex(random_bytes(50));
      $verified = flase;

      $sql = "INSERT INTO users (username, email,verified, token, password)VALUES (?, ?, ?, ?, ?)";
      $stmt = $conn ->prepare($sql);
      $stmt ->bind_param('ssbss',$username, $email, $verified, $token, $hash);

      if($stmt -> execute()) {

       
        header('location:login.php');


      }else {

        $errors['db_error'] = "Database error : failed to signup";
      }
    }

}


//if the login button is clicked

if(isset($_POST['login-btn'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  
 
  //ensure that form fill properly
  
  if(empty($username)) {
    $errors['username'] = "Username is required";
   }
 
   if(empty($password)) {
    $errors['password'] = "Password is required";
   }

   $sql = "select * from users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
    while($rows =mysqli_fetch_assoc($result)) {
      if(password_verify($password, $rows['password'])) {

           $_SESSION['username'] = $username;
           header('location:index.php');

      }else {
        
        $errors['db_error'] = "Database error : failed to login";

      }
    }
   }

}    
      
  
//  logout 
   if(isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['username']);
     header('location:index.php');
   }
  // admin logout 
  if(isset($_GET['adminlogout'])) {
    session_destroy();
    unset($_SESSION['adminname']);
    header('location:admin_login.php');
  }
  
     ///add featured product

  if(isset($_POST['Add_fproduct-btn'])) {
  
        if(isset($_FILES['productimag'])) { 
          $ffile_name = $_FILES['productimag']['name'];
          $ffile_size = $_FILES['productimag']['size'];
          $ffile_tmp = $_FILES['productimag']['tmp_name'];
          $ffile_type = $_FILES['productimag']['type'];
          move_uploaded_file($ffile_tmp,"images/".$ffile_name);
          if(empty($ffile_name )) {
            $errors['productimag'] = "product image is required";
          }
         }
     
      

        if(isset($_FILES['thumbnail1'])) {

               $ffile_name_1 = $_FILES['thumbnail1']['name'];
               $ffile_size = $_FILES['thumbnail1']['size'];
               $ffile_tmp = $_FILES['thumbnail1']['tmp_name'];
               $ffile_type = $_FILES['thumbnail1']['type'];
               move_uploaded_file($ffile_tmp,"images/".$ffile_name_1);
               if(empty($ffile_name_1)) {
                $errors['thumbnail1'] = "thumbnail1 is required";
              }
              }
        if(isset($_FILES['thumbnail2'])) {

              $ffile_name_2 = $_FILES['thumbnail2']['name'];
              $ffile_size = $_FILES['thumbnail2']['size'];
              $ffile_tmp = $_FILES['thumbnail2']['tmp_name'];
              $ffile_type = $_FILES['thumbnail2']['type'];
              move_uploaded_file($ffile_tmp,"images/".$ffile_name_2);
              if(empty($ffile_name_2)) {
                $errors['thumbnail2'] = "thumbnail2 is required";
              }
           }
        if(isset($_FILES['thumbnail3'])) {

            $ffile_name_3 = $_FILES['thumbnail3']['name'];
            $ffile_size = $_FILES['thumbnail3']['size'];
            $ffile_tmp = $_FILES['thumbnail3']['tmp_name'];
            $ffile_type = $_FILES['thumbnail3']['type'];
            move_uploaded_file($ffile_tmp,"images/".$ffile_name_3);
            if(empty($ffile_name_3)) {
              $errors['thumbnail3'] = "thumbnail3 is required";
            }
         }
        if(isset($_FILES['thumbnail4'])) {

          $ffile_name_4 = $_FILES['thumbnail4']['name'];
          $ffile_size = $_FILES['thumbnail4']['size'];
          $ffile_tmp = $_FILES['thumbnail4']['tmp_name'];
          $ffile_type = $_FILES['thumbnail4']['type'];
          move_uploaded_file($ffile_tmp,"images/".$ffile_name_4);
          if(empty($ffile_name_4)) {
            $errors['thumbnail4'] = "thumbnail4 is required";
          }
      
       }
       
       $fproductname = $_POST['productname'];
       $fdescription = $_POST['description'];
       $fprice = $_POST['price'];
   
        
          //ensure that form fill properly
    
    if(empty($fproductname)) {
      $errors['productname'] = "productname is required";
    }
   
    if(empty($fdescription)) {
      $errors['description'] = "Description is required";
    }
     if(empty($fprice)) {
      $errors['price'] = "Price is required";
    }
      $sql = "INSERT INTO featured (product_image,product_name,product_price,product_detail,product_thumbnail_1,product_thumbnail_2,product_thumbnail_3,product_thumbnail_4)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn ->prepare($sql);
      $stmt ->bind_param('ssssssss',$ffile_name, $fproductname, $fprice,$fdescription, $ffile_name_1,$ffile_name_2, $ffile_name_3, $ffile_name_4);

      if($stmt -> execute()) {

       
        header('location:admin_featured_product.php');


      }else {

        $errors['db_error'] = "Database error : failed to signup";
      }
    
  }  
  
    ///add latest product

 if(isset($_POST['Add_latestproduct-btn'])) {
  
    if(isset($_FILES['productimag'])) { 
     $lfile_name = $_FILES['productimag']['name'];
     $lfile_size = $_FILES['productimag']['size'];
     $lfile_tmp = $_FILES['productimag']['tmp_name'];
     $lfile_type = $_FILES['productimag']['type'];
     move_uploaded_file($lfile_tmp,"images/".$lfile_name);
        if(empty($lfile_name )) {
        $errors['productimag'] = "product image is required";
       }
    }
  
    if(isset($_FILES['thumbnail1'])) {

         $lfile_name_1 = $_FILES['thumbnail1']['name'];
         $lfile_size = $_FILES['thumbnail1']['size'];
         $lfile_tmp = $_FILES['thumbnail1']['tmp_name'];
         $lfile_type = $_FILES['thumbnail1']['type'];
         move_uploaded_file($lfile_tmp,"images/".$lfile_name_1);
         if(empty($lfile_name_1)) {
          $errors['thumbnail1'] = "thumbnail1 is required";
        }
    }
    if(isset($_FILES['thumbnail2'])) {

        $lfile_name_2 = $_FILES['thumbnail2']['name'];
        $lfile_size = $_FILES['thumbnail2']['size'];
        $lfile_tmp = $_FILES['thumbnail2']['tmp_name'];
        $lfile_type = $_FILES['thumbnail2']['type'];
        move_uploaded_file($lfile_tmp,"images/".$lfile_name_2);
        if(empty($lfile_name_2)) {
          $errors['thumbnail2'] = "thumbnail2 is required";
        }
    }
    if(isset($_FILES['thumbnail3'])) {

      $lfile_name_3 = $_FILES['thumbnail3']['name'];
      $lfile_size = $_FILES['thumbnail3']['size'];
      $lfile_tmp = $_FILES['thumbnail3']['tmp_name'];
      $lfile_type = $_FILES['thumbnail3']['type'];
      move_uploaded_file($lfile_tmp,"images/".$lfile_name_3);
      if(empty($lfile_name_3)) {
        $errors['thumbnail3'] = "thumbnail3 is required";
      }
   }
    if(isset($_FILES['thumbnail4'])) {

       $lfile_name_4 = $_FILES['thumbnail4']['name'];
      $lfile_size = $_FILES['thumbnail4']['size'];
      $lfile_tmp = $_FILES['thumbnail4']['tmp_name'];
      $lfile_type = $_FILES['thumbnail4']['type'];
       move_uploaded_file($lfile_tmp,"images/".$lfile_name_4);
       if(empty($lfile_name_4)) {
      $errors['thumbnail4'] = "thumbnail4 is required";
     }

    }
 
   $lproductname = $_POST['productname'];
    $ldescription = $_POST['description'];
    $lprice = $_POST['price'];

  
    //ensure that form fill properly

   if(empty($lproductname)) {
   $errors['productname'] = "productname is required";
   }

   if(empty($ldescription)) {
  $errors['description'] = "Description is required";
  }
  if(empty($lprice)) {
  $errors['price'] = "Price is required";
  }
  $sql = "INSERT INTO latest_product (product_image,product_name,product_price,product_detail,product_thumbnail_1,product_thumbnail_2,product_thumbnail_3,product_thumbnail_4)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn ->prepare($sql);
  $stmt ->bind_param('ssssssss',$lfile_name, $lproductname, $lprice,$ldescription, $lfile_name_1,$lfile_name_2, $lfile_name_3, $lfile_name_4);

  if($stmt -> execute()) {

 
  header('location:admin_lattest_product.php');


  }else {

  $errors['db_error'] = "Database error : failed to signup";
  }
 }

     ///add  product

     if(isset($_POST['Add_product-btn'])) {
  
      if(isset($_FILES['productimag'])) { 
        $file_name = $_FILES['productimag']['name'];
        $file_size = $_FILES['productimag']['size'];
        $file_tmp = $_FILES['productimag']['tmp_name'];
        $file_type = $_FILES['productimag']['type'];
        move_uploaded_file($file_tmp,"images/".$file_name);
        if(empty($file_name )) {
          $errors['productimag'] = "product image is required";
        }
       }
   
    

      if(isset($_FILES['thumbnail1'])) {

             $file_name_1 = $_FILES['thumbnail1']['name'];
             $file_size = $_FILES['thumbnail1']['size'];
             $file_tmp = $_FILES['thumbnail1']['tmp_name'];
             $file_type = $_FILES['thumbnail1']['type'];
             move_uploaded_file($file_tmp,"images/".$file_name_1);
             if(empty($file_name_1)) {
              $errors['thumbnail1'] = "thumbnail1 is required";
            }
            }
      if(isset($_FILES['thumbnail2'])) {

            $file_name_2 = $_FILES['thumbnail2']['name'];
            $file_size = $_FILES['thumbnail2']['size'];
            $file_tmp = $_FILES['thumbnail2']['tmp_name'];
            $file_type = $_FILES['thumbnail2']['type'];
            move_uploaded_file($file_tmp,"images/".$file_name_2);
            if(empty($file_name_2)) {
              $errors['thumbnail2'] = "thumbnail2 is required";
            }
         }
      if(isset($_FILES['thumbnail3'])) {

          $file_name_3 = $_FILES['thumbnail3']['name'];
          $file_size = $_FILES['thumbnail3']['size'];
          $file_tmp = $_FILES['thumbnail3']['tmp_name'];
          $file_type = $_FILES['thumbnail3']['type'];
          move_uploaded_file($file_tmp,"images/".$file_name_3);
          if(empty($file_name_3)) {
            $errors['thumbnail3'] = "thumbnail3 is required";
          }
       }
      if(isset($_FILES['thumbnail4'])) {

        $file_name_4 = $_FILES['thumbnail4']['name'];
        $file_size = $_FILES['thumbnail4']['size'];
        $file_tmp = $_FILES['thumbnail4']['tmp_name'];
        $file_type = $_FILES['thumbnail4']['type'];
        move_uploaded_file($file_tmp,"images/".$file_name_4);
        if(empty($file_name_4)) {
          $errors['thumbnail4'] = "thumbnail4 is required";
        }
    
      }
     
      $productname = $_POST['productname'];
      $description = $_POST['description'];
      $category = $_POST['category'];
      $price = $_POST['price'];
 
      
        //ensure that form fill properly
  
      if(empty($productname)) {
       $errors['productname'] = "productname is required";
          }
 
       if(empty($description)) {
       $errors['description'] = "Description is required";
      }
   if(empty($price)) {
    $errors['price'] = "Price is required";
  }
   $sql = "INSERT INTO product (product_category,product_image,product_name,product_price,product_detail,product_thumbnail_1,product_thumbnail_2,product_thumbnail_3,product_thumbnail_4)
    VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?)";
    $stmt = $conn ->prepare($sql);
    $stmt ->bind_param('sssssssss', $category, $file_name, $productname, $price,$description, $file_name_1,$file_name_2, $file_name_3, $file_name_4);
  
    if($stmt -> execute()) {

     
      header('location:admin_product.php');


    }else {

      $errors['db_error'] = "Database error : failed to signup";
    }
  
}  

   ///add category

   if(isset($_POST['Add_category-btn'])) {
  
   $productname = $_POST['category'];
  
    //ensure that form fill properly

   if(empty($productname)) {
   $errors['category'] = "category is required";
   }

  $sql = "INSERT INTO category (category_name)
  VALUES (?)";
  $stmt = $conn ->prepare($sql) or die ('query do not run');
  $stmt ->bind_param('s', $productname);

  if($stmt -> execute()) {

 
  header('location:admin_category.php');


  }else {

  $errors['db_error'] = "Database error : failed to signup";
  }
 }
