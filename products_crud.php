<?php
 
include_once 'database.php';
 
try{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Create
  if (isset($_POST['create'])) {
    $target_dir = "products/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["picture"]["tmp_name"]);
      if ($check !== false) {
        $uploadOk = 1;
      } else {
        echo "<script>alert('Selected file is not an image. Please try again.!');</script>";
        $uploadOk = 0;
      }
    }

    // Check file size
    if ($_FILES["picture"]["size"] > 10000000) {
      echo "<script>alert('Selected file is to large. Please try again.!');</script>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "gif" && $imageFileType != "jpg" ) {
        echo "<script>alert('Only image file JPG and GIF is accepted!');</script>";
        $uploadOk = 0;
      }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "<script>alert('Recording new product fail.');</script>";
      // if everything is ok, try to upload file
    } else {

      $pid = $_POST['pid'];
      if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a173656_pt2(fld_product_num, fld_product_name, fld_product_price, fld_product_brand, fld_product_type, fld_product_weight, fld_product_description, fld_product_stock, fld_product_image) VALUES(:pid, :name, :price, :brand, :type, :weight, :description, :stock, :picture)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':picture', $picture, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $type = $_POST['type'];
    $weight = $_POST['weight'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $picture =  $_FILES["picture"]["name"];

     
    $stmt->execute();
          header("Location:products.php");
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
          echo "<script>alert('Recording new product fail.');</script>";
        }
      }
    }
  }

//Update
if (isset($_POST['update'])) {

  $temp_image = basename($_FILES["picture"]["name"]);

  if ($temp_image == "") {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a173656_pt2 SET fld_product_num = :pid,fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand,fld_product_type = :type, fld_product_weight = :weight, fld_product_description = :description, fld_product_stock = :stock, fld_product_image = :picture WHERE fld_product_num = :oldpid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':picture', $picture, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $type = $_POST['type'];
    $weight = $_POST['weight'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $picture =  $_FILES["picture"]["name"];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      // echo "Error: " . $e->getMessage();
        echo "<script>alert('Recording new product fail.');</script>";
   }
    } else {

      $target_dir = "products/";
      $target_file = $target_dir . basename($_FILES["picture"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check !== false) {
          $uploadOk = 1;
        } else {
          echo "<script>alert('Selected file is not an image. Please try again.!');</script>";
          $uploadOk = 0;
        }
      }

      // Check file size
      if ($_FILES["picture"]["size"] > 10000000) {
        echo "<script>alert('Selected file is too large. Please try again.!');</script>";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if ($imageFileType != "gif" && $imageFileType != "jpg" ) {
        echo "<script>alert('Only image file JPG and GIF is accepted!');</script>";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "<script>alert('Recording new product fail.');</script>";
        // if everything is ok, try to upload file
      } else {

        $pid = $_POST['pid'];
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {

          try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a173656_pt2 SET fld_product_num = :pid,fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand,fld_product_type = :type, fld_product_weight = :weight, fld_product_description = :description, fld_product_stock = :stock, fld_product_image = :picture WHERE fld_product_num = :oldpid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':picture', $picture, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $type = $_POST['type'];
    $weight = $_POST['weight'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $picture =  $_FILES["picture"]["name"];
    $oldpid = $_POST['oldpid'];

     
    $stmt->execute();
          header("Location:products.php");
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
          echo "<script>alert('Recording new product fail.');</script>";
        }
      }
    }
  }
}

//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a173656_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a173656_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
 $conn = null;
} catch (PDOException $e) {
   echo "Error: " . $e->getMessage();
}