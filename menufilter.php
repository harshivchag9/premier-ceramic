<?php  
  require_once("database/database.config.php");
  $db = new Database();
  $sql = Database::getConnection(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Obaju : e-commerce template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    
  </head>
  <body>
    <div class="card sidebar-menu mb-4">
      <div class="card-header">
        <h3 class="h4 card-title">price </h3>
      </div>
      <div class="card-body">
        <div class="row"> 
					<div class="form-group" style="style=width:350px;"><input placeholder="min" type="number" step="500" value="0" class="form-control" max="9999" min="0" id="min_price"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="form-group" style="style=width:350px;"><input placeholder="max" step="500" class="form-control" value="9999" type="number" max="9999" min="0" id="max_price"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="submitprice"> <button id="priceapply" class="common_selector btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button> </div>
        </div>
      </div>
    </div>
    <div class="card sidebar-menu mb-4">
      <div class="card-header">
        <h3 class="h4 card-title">Color <a onclick="clear_filter('color');" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
					<?php
						$res=$sql->query("SELECT DISTINCT(`color`) FROM product_detail ORDER BY `color`");
						while($row = mysqli_fetch_array($res))
            {
          ?>
              <div class="checkbox">
                <label>
                  <label><input type="radio" name="color" class="common_selector color" value="<?= $row['color'] ?>" > <?= $row['color'] ?></label>
                </label>
              </div>
          <?php
            }
          ?>
        </form>
      </div>
      <!-- <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>-->
    </div>
  </div>
  <div class="card sidebar-menu mb-4">
    <div class="card-header">
      <h3 class="h4 card-title">Type <a onclick="clear_filter('type');" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
    </div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <?php
						$res=$sql->query("SELECT DISTINCT(`type`) FROM product_detail ORDER BY `type`");
						while($row = mysqli_fetch_array($res))
            {
          ?>
              <div class="checkbox">
                <label><input type="radio" name="type" class="common_selector type" value="<?= $row['type'] ?>" > <?= $row['type'] ?></label>
              </div>
          <?php
            }
          ?>
        </div>
        <!--<button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>-->
      </form>
    </div>
  </div>
	  <div class="card sidebar-menu mb-4">
      <div class="card-header">
        <h3 class="h4 card-title">Thickness <a onclick="clear_filter('thickness');" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <?php
				  	  $res=$sql->query("SELECT DISTINCT(`thickness`) FROM product_detail ORDER BY `thickness` DESC");
						  while($row = mysqli_fetch_array($res))
              {
            ?>
                <div class="checkbox">
                  <label>
                    <label><input type="radio" name="thickness" class="common_selector thickness" value="<?= $row['thickness'] ?>" > <?= $row['thickness'] ?></label>
                  </label>
                </div>
					  <?php }?>
          </div>
            <!--  <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button> -->
          </form>
        </div>
      </div>
	    <div class="card sidebar-menu mb-4">
        <div class="card-header">
          <h3 class="h4 card-title">Size <a onclick="clear_filter('size');" class=" btn btn-sm btn-danger pull-right"  ><i class="fa fa-times-circle"></i> Clear</a></h3>
        </div>
          <div class="card-body">
          <form>
            <div class="form-group">
            <?php
						  $res=$sql->query("SELECT DISTINCT(`size`) FROM product_detail ORDER BY `size`");
						  while($row = mysqli_fetch_array($res))
              {
            ?>
              <div class="checkbox">
                <label>
                  <label><input type="radio" name="size" class="common_selector size" value="<?= $row['size'] ?>" > <?= $row['size'] ?></label>
                </label>
              </div>
					    <?php }?>
            </div>
                  <!--  <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>-->
          </form>
        </div>
      </div>
	  	  
	  
	  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    
    <script src="js/front.js"></script>
    <script src="js/FilterProduct.js"></script>
  </body>
</html>