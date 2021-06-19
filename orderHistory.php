<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Premier Ceramic</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    
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
	  <?php  require('header.php')  ?>
    <br>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">My orders</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <div class="card sidebar-menu">
                <div class="card-header">
                  <h3 class="h4 card-title">Customer section</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column"><a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> My orders</a><a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> My account</a><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></ul>
                </div>
              </div>
            </div>
            <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h1>My orders</h1>
                <p class="lead">Your orders on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Invoice</th>
                      </tr>
                    </thead>
                    <tbody>
						
          <?php 
            require_once("database/database.config.php");
            $db = new Database();
            $sql = Database::getConnection(); 
            if(isset($_SESSION['loggeduserid']))
            {	
	  					$selectqry="SELECT DISTINCT(`orderid`) FROM orderproduct WHERE user_id=$_SESSION[loggeduserid] AND payment=1";
	  					$res=$sql->query($selectqry);
              while($row=mysqli_fetch_assoc($res))
              {
							  $row1=mysqli_fetch_array($sql->query("select * from payment WHERE ORDERID ='$row[orderid]'"));
						?>	
                <tr>
                  <th><?=$row['orderid'] ?></th>
                  <td><?=$row1['TXNDATE'] ?></td>
                  <td>&#8377;<?=$row1['TXNAMOUNT'] ?></td>
                  <td><span class="badge badge-info"><?= $row1['orderstatus'] ?></span></td>
                  <td><a id="invoice" href="invoicepdf.php?orderid=<?=$row['orderid'] ?>" target="_blank" type="button" class="btn btn-primary" value="View" >View</a></td>
                  <!--<td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>-->
                </tr>
      <?php 
              } 
            }
            else
            { 
              echo "<script type='text/javascript'>window.top.location='register.php';alert('please Login For see Order history');</script>"; 
              exit;
            }
      ?>
            <script type="text/javascript">
	  						function viewinvoice(orderid)
                {
		  						$.post("pdf2.php",{orderid,orderid},function(){
                });
	  						}
            </script>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  </div> 
	  <?php require('footer.php') ?>
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