<?php session_start(); ?>
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
	  
  <?= require('header.php')  ?>
  <div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
        <div class="col-lg-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Checkout - Order review</li>
            </ol>
          </nav>
        </div>
        <div id="checkout" class="col-lg-9">
          <div class="box">
            <form method="get" action="orderHistory.php">
              <h1>Checkout - Order review</h1>
              <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Address</a><a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="checkout3.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Order Review</a></div>
                <div class="content">
                <?php 
                  if(isset($_GET['status'])){  ?>
                    <div class="table-responsive">
                <?php 
                    if($_GET['status']=='success'){ ?>
                      <center><h1> Product Order Successfully  </h1></center>
                <?php 
                    } 
                    else if($_GET['status']=='fail'){ ?>
                      <center><h1 style="color: red;"> Payment Fail  </h1></center>
                <?php
                    } 
                  }
                ?>
              </div>
              <div class="box-footer d-flex justify-content-between"><a class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to payment method</a>
                <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i></button>
              </div>
            </form>
          </div>
        </div>
        <?php
          if(isset($_SESSION['loggeduserid']))
          {
						require_once("database/database.config.php");
	          $db = new Database();
	          $sql = Database::getConnection();
						$res=$sql->query("select * from cart WHERE User_id = $_SESSION[loggeduserid]");
						$row = "";
            $ship=0;$count=0;$delivery=0;$total=0;
						while($row = mysqli_fetch_array($res))
						{
						  $count++;		
						  $row1=mysqli_fetch_array($sql->query("select * from product_detail WHERE product_id = $row[Product_id]"));

              $total = $total + ($row['quantity']*$row1['price']);
							$tax = $total*18.00/100;
							$delivery=$delivery+($row['quantity']*15);
							$finalvalue = $total+$tax+$delivery;
							$ship = $ship + ($row['quantity']*15);
						}   
  			  }
        ?>
          <div class="col-lg-3">
            <div id="order-summary" class="box" style="width:300px" >
              <div class="box-header">
                <h3 class="mb-0">Order summary</h3>
              </div>
              <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
              <div  class="table-responsive">
                <table id="summery" class="table">
                  <tbody>
                    <tr>
                      <td>Order subtotal</td>
                      <th>&#8377;<span id="subtotal"><?=isset($total)?$total:""?></span></th>
                    </tr>
                    <tr>
                      <td>Shipping and handling</td>
                      <th>&#8377;<span id="shipping"><?=isset($ship)?$ship:""?></span></th>
                    </tr>
                    <tr>
                      <td>Tax</td>
                      <th>&#8377;<span id="tax"><?=isset($tax)?$tax:""?></span></th>
                    </tr>
                    <tr class="total">
                      <td>Total</td>
                      <th>&#8377;<span id="finalvalue"><?=isset($finalvalue)?$finalvalue:""?></span></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
   
  <?php require('footer.php')  ?>
	  
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/front.js"></script>
  </body>
</html>