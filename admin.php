<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./libs/css/login.css">
  <title>Document</title>
</head>

<body>

</body>

</html>

<?php
$page_title = 'Admin Home Page';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$c_categorie     = count_by_id('categories');
$c_product       = count_by_id('products');
$c_sale          = count_by_id('sales');
$c_user          = count_by_id('users');
$products_sold   = find_higest_saleing_product('10');
$recent_products = find_recent_product_added('5');
$recent_sales    = find_recent_sale_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div>
  <div class="row" style="display: flex;flex-direction:column;">

    <div style="justify-content:space-between;">
      <a href="users.php" style="color:black;">
        <div class="col-md-3" style="margin: 50px;width:400px;">
          <div class="panel panel-box clearfix" style="border-radius: 0px 100px 0px 100px;height:150px;">
            <div class="panel-icon pull-left bg-secondary1" style="border-radius: 0px 100px 0px 100px;height:150px;">
              <i class="fa-solid fa-users"></i>
            </div>
            <div class="panel-value pull-right">
              <h2 class="margin-top"> <?php echo $c_user['total']; ?> </h2>
              <p class="text-muted">Users</p>
            </div>
          </div>
        </div>
      </a>

      <a href="categorie.php" style="color:black;">
        <div class="col-md-3" style="margin: 50px;width:400px;">
          <div class="panel panel-box clearfix" style="border-radius: 0px 100px 0px 100px;height:150px;">
            <div class="panel-icon pull-left bg-red" style="border-radius: 0px 100px 0px 100px;height:150px;">
              <i class="fa-solid fa-qrcode"></i>
            </div>
            <div class="panel-value pull-right">
              <h2 class="margin-top"> <?php echo $c_categorie['total']; ?> </h2>
              <p class="text-muted">Categories</p>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div style="justify-content:space-between; margin:50px;">
      <a href="product.php" style="color:black;">
        <div class="col-md-3" style="margin: 50px;width:400px;">
          <div class="panel panel-box clearfix" style="border-radius: 0px 100px 0px 100px;height:150px;">
            <div class="panel-icon pull-left bg-blue2" style="border-radius: 0px 100px 0px 100px;height:150px;">
              <i class="fa-brands fa-opencart"></i>
            </div>
            <div class="panel-value pull-right">
              <h2 class="margin-top"> <?php echo $c_product['total']; ?> </h2>
              <p class="text-muted">Products</p>
            </div>
          </div>
        </div>
      </a>

      <a href="sales.php" style="color:black;">
        <div class="col-md-3" style="margin: 50px;width:400px;">
          <div class="panel panel-box clearfix" style="border-radius: 0px 100px 0px 100px;height:150px;">
            <div class="panel-icon pull-left bg-green" style="border-radius: 0px 100px 0px 100px;height:150px;">
              <i class="fa-solid fa-indian-rupee-sign"></i>
            </div>
            <div class="panel-value pull-right">
              <h2 class="margin-top"> <?php echo $c_sale['total']; ?></h2>
              <p class="text-muted">Sales</p>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>





<div style="display: flex;justify-content:center;flex-direction:column; width:20000px;">


  <div class="row" style="display: flex;flex-direction:row;">

    <div class="col-md-4" style="width: fit-content;max-width:50%;">
      <div class="panel panel-default" style="background-color: transparent;border:none;">

        <div class="panel-body" style="max-width:fit-content;">
          <img src="./libs/images/highsell.gif" alt="" srcset=""><br />
        </div>
      </div>
    </div>



    <div class="col">
      <div class="panel panel-default bg-success">
        <div class="panel-heading bg-success" style="width: 451px;">
          <strong>
            <i class="fa-brands fa-sellcast"></i>
            <span>Highest Selling Products</span>
          </strong>
        </div>
        <div class="panel-body bg-success" style="max-width:fit-content;">
          <table class="table table-striped table-bordered table-condensed bg-success">
            <thead>
              <tr>
                <th>Title</th>
                <th>Total Sold</th>
                <th>Total Quantity</th>
              <tr>
            </thead>
            <tbody class="bg-success">
              <?php foreach ($products_sold as  $product_sold) : ?>
                <tr class="bg-success">
                  <td class="bg-success"><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                  <td class="bg-success"><?php echo (int)$product_sold['totalSold']; ?></td>
                  <td class="bg-success"><?php echo (int)$product_sold['totalQty']; ?></td>
                </tr>
              <?php endforeach; ?>
            <tbody>
          </table>
        </div>
      </div>
    </div>

  </div>





  <div class="row" style="display: flex;flex-direction:row;">


    <div class="col-md-4" style="width: fit-content;">

      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <i class="fa-brands fa-sellcast"></i>
            <span>LATEST SALES</span>
          </strong>
        </div>
        <div class="panel-body bg-success" style="max-width:fit-content;">
          <table class="table table-striped table-bordered table-condensed bg-success">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Product Name</th>
                <th>Date</th>
                <th>Total Sale</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($recent_sales as  $recent_sale) : ?>
                <tr>
                  <td class="text-center bg-success"><?php echo count_id(); ?></td>
                  <td class="bg-success">
                    <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
                      <?php echo remove_junk(first_character($recent_sale['name'])); ?>
                    </a>
                  </td>
                  <td class="bg-success"><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                  <td class="bg-success"><i class="fa-solid fa-indian-rupee-sign bg-success"></i><?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="col-md-4" style="width: fit-content;max-width:50%;">
      <div class="panel panel-default" style="background-color: transparent;border:none;">

        <div class="panel-body" style="max-width:fit-content;">
          <img src="./libs/images/latestsale.gif" alt="" srcset=""><br />
        </div>
      </div>
    </div>


  </div>


  <!-- <div class="row" style="display: flex;flex-direction:row;">

  <div class="col-md-4" style="width: fit-content;max-width:50%;">
      <div class="panel panel-default">

        <div class="panel-body" style="max-width:fit-content;">
          <img src="./libs/images/highsell.gif" alt="" srcset=""><br />
        </div>
      </div>
    </div>


    <div class="col-md-4" style="width: fit-content;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <i class="fa-brands fa-sellcast"></i>
            <span>Recently Added Products</span>
          </strong>
        </div>
        <div class="panel-body" style="max-width:fit-content;">

          <div class="list-group">
            <?php foreach ($recent_products as  $recent_product) : ?>
              <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$recent_product['id']; ?>">
                <h4 class="list-group-item-heading">
                  <?php if ($recent_product['media_id'] === '0') : ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                  <?php else : ?>
                    <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image']; ?>" alt="" />
                  <?php endif; ?>
                  <?php echo remove_junk(first_character($recent_product['name'])); ?>
                  <span class="label label-warning pull-right">
                    <i class="fa-solid fa-indian-rupee-sign"></i><?php echo (int)$recent_product['sale_price']; ?>
                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                  <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>



  </div> -->


</div>



<?php include_once('layouts/footer.php'); ?>