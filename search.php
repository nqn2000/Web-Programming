<?php
require 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Baby Home Play : Search</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3082/3082060.png">

   
</head>
<style type="text/css">
    .btn-success, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
    background-color: #7a4920 !important;
    }
</style>
<body style="background-image: url(bgBabyhomeplay3.png); background-size: 100%;">

<?php include_once 'nav_bar.php'; ?>
<div class="container-fluid dark" style="padding-bottom: 30px;">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="page-header">
                <h2>Search for Products</h2>
            </div>

            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
      <div class="row">
    <div class="col-sm-10">
    <input class="form-control" type="text" id="inputKeyword" name="search" required placeholder="Search any Product based on Name, Brand Or Type">
      </div>

  <div>
  <button type="submit" name="submit" class="btn btn-success" value="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
  </div>
  </form>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Products</h2>
            </div>
            <table class="table table-striped table-bordered" style="background-color: #FFE6BE">
                <tr style="font-weight: bold; background-color: #A68773;">
                    <th width="8%">Product ID</th>
                    <th><center>Name</center></th>
                    <th width="5%">Price (RM)</th>
                    <th>Brand</th>
                    <th width="5%">Type</th>
                    <th><center>Weight</center></th>
                  <th><center>Description</center></th>
                    <th>Stock</th>
                    <th width= "5%"></th>
                </tr>
                <tbody>
                <?php
                $result = array();
                if (isset($_POST['search'])) {
                    $keywords = explode(" ", $_POST['search']);

                    if (count($keywords) == 2) {
                        $name = "%" . $keywords[0] . "%";
                        $brand = "%" . $keywords[1] . "%";
                        

                        $stmt = $db->prepare("SELECT * FROM tbl_products_a173656_pt2 WHERE fld_product_name LIKE :name AND fld_product_brand LIKE :brand AND fld_product_type LIKE :type ORDER BY fld_product_num ASC");
                        $stmt->bindParam(":name", $name);
                        $stmt->bindParam(":brand", $brand);
                        

                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } elseif (count($keywords) == 1) {
                        $search = "%{$keywords[0]}%";
                        $stmt = $db->prepare("SELECT * FROM `tbl_products_a173656_pt2` WHERE fld_product_name LIKE :param OR fld_product_brand LIKE :param OR fld_product_type LIKE :param ORDER BY fld_product_num ASC");
                        $stmt->bindParam(":param", $search);

                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        echo "<tr><td colspan='6'>No information available. (<p class='text-danger'>Please check you search keywords.</p>)</td></tr>";
                    }
                } else {
                    $stmt = $db->query("SELECT * FROM tbl_products_a173656_pt2 ORDER BY fld_product_num ASC LIMIT 0,10");
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }

                if (count($result) > 0) {
                    foreach ($result as $readrow) {
                        if (empty($readrow['fld_product_image'])) {
                            $readrow['fld_product_image'] = "{$readrow['fld_product_num']}.jpg";
                        }
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
                            <td class="text-center">
                                <a target="_blank"
                                   href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>"
                                   class="btn btn-success btn-xs" role="button">Details</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No information available.</td></tr>";
                }
                ?>
                </body>
            </table>
        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>

<script type="application/javascript">
    $('#imageModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const imgUrl = button.data('img');
        const productName = button.data('name');

        const modal = $(this);
        modal.find('.modal-title').text(`${productName}'s image`);
        modal.find('.product-image').prop('title', `${productName}'s image`);
        modal.find('.product-image').attr('src', 'products/' + imgUrl);
    });

    $('.product-image').on("error", function () {
        this.src = 'products/no-photo.jpg';
    });
</script>
</body>
</html>
