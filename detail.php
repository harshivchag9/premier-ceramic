<?php 
  session_start(); 
  require('php/recentview.php')
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
	  <script src="js/refresh.js"></script> 
    <style>
   .img-fluid1 {
    width: 200px; /* You can set the dimensions to whatever you want */
    height: 200px;
    object-fit: cover;
}
   </style>
	  <script type="text/javascript">
	    function click_wishlist(id){
       	//var productid = $('#productid').val();  
				  $.post('php/wish.php' , { id:id } , function(data){
				  alert('Item Added To wishlist');
				  jQuery('#wishlist-'+id).addClass("btn btn-outline-primary disabled");
				  $('#wishlist-'+id).prop("onclick", null);
	      //$('#form')[0].reset();
        });
      }
      function notlogged()
      {
        var check = confirm("Please Login\nyou can not able to add product in cart/wishlist without login ");
  			if(check == true)
	  		{
		  	  document.getElementById("login").click();
		  	}
      }
    </script>
  </head>
  <body>
	  <?= require('header.php') ?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
          <?php
            require_once("database/database.config.php");
            $db = new Database();
            $sql = Database::getConnection();
			
    			  if (isset($_GET['id'])) 
		  		  {	
  					  $data = $sql->query("SELECT * FROM product_detail WHERE product_id ='$_GET[id]' LIMIT 1");
	  				  if(mysqli_num_rows($data) > 0)
		  			  {
			  			  while($row = mysqli_fetch_array($data))
				  		  {  
          ?>
            
            <div class="col-lg-12">
              <div id="productMain" class="row">
                <div class="col-md-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  <?php
                    $res1=$sql->query("select * from product_photo WHERE product_id='$row[productimg]'");
                      while($row1=mysqli_fetch_array($res1))
                      { 
					        ?>
                        <div class="item"> <img src="<?php echo $row1['image'];?>" alt="" class="img-fluid"></div>
                  <?php 
                      } 
                  ?>
                    <!--<div class="item"> <img src="img/detailbig2.jpg" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="img/detailbig3.jpg" alt="" class="img-fluid"></div>-->
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <h1 class="text-center"><?= $row['product_name']  ?></h1>
                  <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                  <p class="price">&#8377 <?= $row['price'] ?></p>
                  <p class="text-center buttons">
						      <?php
							
                    if(!isset($_SESSION['loggeduserid']))
                    {
                      echo "<a id='addcart' onClick='notlogged()' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>";   
                    }
                    else
                    {
                      $sql1= $sql->query("SELECT * FROM cart WHERE Product_id='$row[product_id]' AND User_id='$_SESSION[loggeduserid]' LIMIT 1");
                      $numberofrow = mysqli_num_rows( $sql1 );
                      if ( $numberofrow < 1 )
                      { 
                  ?>
                          <a id="addcart-<?=$_GET['id']?>" onClick="click_cart(<?= $row['product_id']?>)" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                  <?php 
                      }
                      else
                      {
                        echo "<a id='addcartdisabled' class='btn btn-primary disabled'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
                      }
                    }  
      							if(!isset($_SESSION['loggeduserid']))
			    					{
					    			  echo "<a id='wishlistdisabled' onClick='notlogged()'  class='btn btn-outline-primary'><i class='fa fa-heart'></i> Add to wishlist</a>";   
                    }
                    else
                    {						
							        $sql1=$sql->query("SELECT * FROM wishlist WHERE Product_id='$row[product_id]' AND User_id='$_SESSION[loggeduserid]' LIMIT 1");
                      $numberofrow2 = mysqli_num_rows( $sql1 );
                      if ( $numberofrow2 < 1 )
                      {
					      	?>
      							    <a id="wishlist-<?=$_GET['id']?>" onClick="click_wishlist(<?=$row['product_id']?>)" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a>
      						<?php
			      			    } 
						          else
						          {
						      ?>
        							  <a id="wishlistdisabled"  class="btn btn-outline-primary disabled"><i class="fa fa-heart"></i> Add to wishlist</a> 
                  <?php 
                      }  
                    }  
                  ?>
                  </p>
                </div>
                <div data-slider-id="1" class="owl-thumbs">
                  <?php  
                    $res2=$sql->query("select * from product_photo WHERE product_id='$row[productimg]'");
                    while($row2=mysqli_fetch_array($res2))
                    { 
                  ?>
                      <button class="owl-thumb-item"><img src="<?= $row2['image']  ?>" alt="" class="img-fluid"></button>
                  <?php 
                    } 
                  ?>
                    <!--<button class="owl-thumb-item"><img src="img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="img/detailsquare3.jpg" alt="" class="img-fluid"></button>-->
                </div>
              </div>
            </div>
            <div id="details" class="box">
              <p></p>
                 <h4>Color</h4>
                <p><?= $row['color']?></p>
                <h4>Size </h4>
                <P><?=$row['size']?></P>
				        <h4>Type </h4>
                <P><?=$row['type']?></P>
				        <h4>Usage </h4>
                <P><?=$row['usage']?></P>
				        <h4>Pieces per one box </h4>
                <P><?=$row['pieceinbox']?></P>
				        <h4>Thickness </h4>
                <P><?= isset($row['thickness'])?$row['thickness']:""?></P>
				        <h4>weight </h4>
               <P><?=$row['weight']?></P>
                  <p><em><?=isset($row['description'])?$row['description']:""?></em></p>
                <hr>
            </div>
      <?php
						}
					} 
          else 
          {
						echo "That item does not exist.";
						exit();
					}
				} else 
			 	{
					echo "Data to render this page is missing.";
					exit();
			 	}
        if(isset($_SESSION['loggeduserid']))
        { 
      ?>
          <div class="row same-height-row">
            <div class="col-lg-3 col-md-6">
              <div class="box same-height">
                <h3>Products viewed recently</h3>
              </div>
            </div>
				    <?php 
				      $count=0;
              $res=$sql->query("SELECT product_id FROM recent WHERE user_id=$_SESSION[loggeduserid]");
              while($row1=mysqli_fetch_assoc($res))
              {
					      $res1=$sql->query("SELECT * FROM product_detail WHERE product_id=$row1[product_id]");
                while($row=mysqli_fetch_assoc($res1))
                {
                  if($count==3)
                  {
				            echo "<div class='col-lg-3 col-md-6'></div>";
                  } 
                  $res2=$sql->query("select * from product_photo WHERE product_id='$row[productimg]'");
                  while($row2=mysqli_fetch_array($res2))
                  { 
					  ?>
                    <div class="col-lg-3 col-md-6">
                      <div class="product same-height">
                        <div class="flip-container">
                          <div class="flipper">
                            <div class="front"><a href="detail.php?id=<?=$row['product_id']?>"><img src="<?=$row2['image'] ?>" alt="" class="img-fluid img-fluid1"></a></div>
                            <div class="back"><a href="detail.php?id=<?=$row['product_id']?>"><img src="<?=$row2['image'] ?>" alt="" class="img-fluid img-fluid1"></a></div>
                          </div>
                        </div>
                        <a href="detail.php?id=<?= $row['product_id'] ?>" class="invisible"><img src="<?=$row2['image'] ?>" alt="" class="img-fluid img-fluid1"></a>
                        <div class="text">
                          <h3><?=$row['product_name'] ?></h3>
                          <p class="price">&#8377;<?=$row['price'] ?></p>
                        </div>
                      </div>
                    </div>
      <?php 
            $count++; 
                  } 
                }
              } 
              echo "</div>";
        } 
      ?>
            </div>
          </div>
        </div>
      </div>
    </div>
   <?= require('footer.php') ?>

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