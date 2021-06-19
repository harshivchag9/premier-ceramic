<?php session_start();	 
	require_once("database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
?>

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
   <style>
   .img-fluid {
    width: 200px; /* You can set the dimensions to whatever you want */
    height: 200px;
    object-fit: cover;
}
   </style>
		<script src="js/refresh.js" ></script>
  </head>
  <body>
    <?=require('header.php')?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">My wishlist</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <div class="card sidebar-menu">
                <div class="card-header">
                  <h3 class="h4 card-title">Customer section</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                  <a href="orderHistory.php" class="nav-link"><i class="fa fa-list"></i> My orders</a>
                  <a href="wishlist.php" class="nav-link active"><i class="fa fa-heart"></i> Wishlist</a>
                  </ul>
                </div>
              </div>
            </div>
            <div id="wishlist" class="col-lg-9">
              <div class="box">
                <h1>My wishlist</h1>
                <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
              </div>
            <div class="row products">
          <?php
						$res=$sql->query("select * from wishlist WHERE User_id = $_SESSION[loggeduserid]");
						$row = "";
						while($row = mysqli_fetch_array($res))
						{
              $row1=mysqli_fetch_array($sql->query("select * from product_detail WHERE product_id = $row[Product_id]"));

              $res2=$sql->query("select * from product_photo WHERE product_id='$row1[productimg]' LIMIT 1");
              $row2=mysqli_fetch_array($res2);
             
              $image=	isset($row2['image'])?$row2['image'] :"";
		      ?>
          		<div class="col-lg-3 col-md-4">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front">
                        <?php
                          echo'<a href="detail.php?id=' . $row1['product_id'] . '"><img src="' . $image . '" alt=""  class="img-fluid"></a>';
                        ?>
                      </div>
                      <div class="back">
        							  <?php
									        echo'<a href="detail.php?id=' . $row1['product_id'] . '"><img src="' . $image . '"  alt="" class="img-fluid"></a>';
          							?>
					            </div>
                    </div>
                  </div> 
    							<?php
		    						echo'<a href="detail.php?id=' . $row1['product_id'] . '"><img src="' . $image . '" alt=""  class="img-fluid"></a>';
  					  		?>
                  <div class="text">
                    <h3>
                      <?= '<a href=" detail.php?id=' . $row1['product_id'] . ' ">'.$row1['product_name'].'</a>'?>
					          </h3>
        					  <p class="price">
                      <del></del> &#8377 <?php echo($row1['price']);  ?>
                    </p>
                    <p class="buttons">
        						  <?='<a href=" detail.php?id=' . $row1['product_id'] . ' " class="btn btn-outline-secondary"> View detail </a>' ?>
        					  	<?php  
                        $sql1= $sql->query("SELECT * FROM cart WHERE Product_id='$row1[product_id]' AND User_id='$_SESSION[loggeduserid]' LIMIT 1");
                        $numberofrow = mysqli_num_rows( $sql1 );
                        if ( $numberofrow < 1 )
                        {
						          ?>
      							    <a id="addcart-<?=$row1['product_id']?>" onClick="click_cart(<?=$row1['product_id']?>)" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
          						<?php
            						}
					            	else
					            	{
          						?>
        							   <a id="addcartdisabled" class="btn btn-primary disabled"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      <?php 
                        }  
                      ?>
        					  </p> 
                  </div>
                </div>
              </div>
      <?php
           }	
      ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?=require('footer.php')?>
    

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