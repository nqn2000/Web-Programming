<?php

  include_once 'products_crud.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Baby Home Play : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3082/3082060.png">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-image: url(bgBabyhomeplay3.png); background-size: 100%;">

   <?php include_once 'nav_bar.php'; ?>
 

   <div class="container-fluid">
    <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
                                ?>

    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
     <h2>Create New Product</h2>
      </div>
  

    <form action="products.php" method="post" enctype="multipart/form-data"class="form-horizontal">

      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">Product ID</label>
          <div class="col-sm-9">
           <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
        </div>
      </div>

      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div>

       <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price(RM)</label>
          <div class="col-sm-9">
           <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required>
        </div>
        </div>

      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
          <select name="brand" class="form-control" id="productbrand" required>
            <option value="">Please select</option>
            <option value="Animal Alley" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Animal Alley") echo "selected"; ?>>Animal Alley</option>
            <option value="Baby Alive" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Baby Alive") echo "selected"; ?>>Baby Alive</option>
            <option value="Barbie" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Barbie") echo "selected"; ?>>Barbie</option>
            <option value="Bright Starts" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Bright Starts") echo "selected"; ?>>Bright Starts</option>
            <option value="BRU Infant & Preschool" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="BRU Infant & Preschool") echo "selected"; ?>>BRU Infant & Preschool</option>
            <option value="Crayola" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Crayola") echo "selected"; ?>>Crayola</option>
            <option value="Fisher-Price" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Fisher-Price") echo "selected"; ?>>Fisher-Price</option>
            <option value="Frozen" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Frozen") echo "selected"; ?>>Frozen</option>
            <option value="FurReal" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="FurReal") echo "selected"; ?>>FurReal</option>
            <option value="Happy Well" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Happy Well") echo "selected"; ?>>Happy Well</option>
            <option value="J'adore" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="J'adore") echo "selected"; ?>>J'adore</option>
            <option value="L.O.L Surprise!" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="L.O.L Surprise!") echo "selected"; ?>>L.O.L Surprise!</option>
            <option value="McFarlane Toy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="McFarlane Toy") echo "selected"; ?>>McFarlane Toy</option>
            <option value="Perfectly Cute" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Perfectly Cute") echo "selected"; ?>>Perfectly Cute</option>
            <option value="Petit Collage" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Petit Collage") echo "selected"; ?>>Petit Collage</option>
            <option value="Pitter Patter Pets" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Pitter Patter Pets") echo "selected"; ?>>Pitter Patter Pets</option>
            <option value="Play-Doh" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Play-Doh") echo "selected"; ?>>Play-Doh</option>
            <option value="Takara Tomy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Takara Tomy") echo "selected"; ?>>Takara Tomy</option>
            <option value="Transformers" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Transformers") echo "selected"; ?>>Transformers</option>
            <option value="Ultraman" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Ultraman") echo "selected"; ?>>Ultraman</option>
            <option value="Universe of Imagination" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Universe of Imagination") echo "selected"; ?>>Universe of Imagination</option>
            <option value="You & Me" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="You & Me") echo "selected"; ?>>You & Me</option>
            <option value="Zoids" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Zoids") echo "selected"; ?>>Zoids</option>
           </select>
        </div>
        </div> 

        <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
          <select name="type" class="form-control" id="producttype" required>
            <option value="">Please select</option>
            <option value="Baby Toys" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Baby Toys") echo "selected"; ?>>Baby Toys</option>
            <option value="Dolls & Collectibles" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Dolls & Collectibles") echo "selected"; ?>>Dolls & Collectibles</option>
            <option value="Figurines" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Figurines") echo "selected"; ?>>Figurines</option> 
            <option value="Learning Toys" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Learning Toys") echo "selected"; ?>>Learning Toys</option>
            <option value="Puzzles" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Puzzles") echo "selected"; ?>>Puzzles</option>
            <option value="Soft Toys" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Soft Toys") echo "selected"; ?>>Soft Toys</option>
            <option value="Wooden Toys" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Wooden Toys") echo "selected"; ?>>Wooden Toys</option>
          </select>
        </div>
      </div> 

      <div class="form-group">
          <label for="productweight" class="col-sm-3 control-label">Weight(kg)</label>
          <div class="col-sm-9">
           <input name="weight" type="number" class="form-control" id="productweight" placeholder="Product Weight" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_weight']; ?>" min="0.0" step="0.01" required>
        </div>
        </div>

      <div class="form-group">
          <label for="productdesc" class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <input name="description" type="text" class="form-control" id="productdesc" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div>


      <div class="form-group">
          <label for="productstock" class="col-sm-3 control-label">Stock</label>
          <div class="col-sm-9">
          <input name="stock" type="number" class="form-control" id="productstock" placeholder="Product Stock" accept="image/gif" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>"  min="0" required>
        </div>
        </div>


        <!--  upload picture -->
       <div class="form-group">
          <label for="picture" class="col-sm-3 control-label">Product Image</label>
          <div class="col-sm-9">
            <input name="picture" type="file" class="form-control" id="picture" placeholder="Upload Picture" accept="image/*" value="<?php if(isset($_GET['edit'])) echo 'products/' . $editrow['fld_product_image']; ?>" required>
      
        </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        
        </div>
      </div>
    </form>
    </div>
  </div>

<?php } ?>


    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered" style="background-color: #FFE6BE">
        <tr style="font-weight: bold; background-color: #A68773;">
        <th>Product ID</th>
        <th>Name</th>
        <th>Price (RM)</th>
        <th>Brand</th>
        <th>Type</th>
        <th>Weight (kg)</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Image</th>
        <th></th>
      </tr>

         <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a173656_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();

      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_weight']; ?></td>
        <td><?php echo $readrow['fld_product_description']; ?></td>
        <td><?php echo $readrow['fld_product_stock']; ?></td>
        <td><?php echo "<img src='products/".$readrow['fld_product_image']."' width=150px; >"; ?></td>

        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>

       <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
                                ?>

          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          <?php } ?>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
  </div>
     </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a173656_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>

  </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    $(document).on("click", ".browse", function() {
      var file = $(this).parents().find(".file");
      file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $("#file").val(fileName);

      var reader = new FileReader();
      reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
      };
      // read the image file as a data URL.
      reader.readAsDataURL(this.files[0]);
    });



  </script>

</body>
</html>
