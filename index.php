<?php 
  session_start();
  
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
  </head>
  <body onLoad="load();">
	  <script type="text/javascript">
	  	function load()
			{
				document.getElementById('navindex').className='nav-link active';
			}
	  </script>
    <?php require('header.php')?>
    <br>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div id="main-slider" class="owl-carousel owl-theme">
                    <div class="item"><img src="img/1.jpg" alt="" class="img-fluid"></div>
                    <div class="item"><img src="img/2.jpg" alt="" class="img-fluid"></div>
                    <div class="item"><img src="img/3.jpg" alt="" class="img-fluid"></div>
                    <div class="item"><img src="img/4.jpg" alt="" class="img-fluid"></div>
                    <div class="item"><img src="img/5.jpg" alt="" class="img-fluid"></div>
                </div>
            </div>
          </div>
        </div>
        <div id="advantages">
          <div class="container">
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-heart"></i></div>
                  <h3><a href="#">We love our customers</a></h3>
                  <p class="mb-0">We are known to provide best possible service ever</p>
               </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <h3><a href="#">Best prices</a></h3>
                  <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <h3><a href="#">100% satisfaction guaranteed</a></h3>
                  <p class="mb-0">We Believe in quality</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--<div class="container">
          <div class="col-md-12">
            <div class="box slideshow">
              <h3>Get Inspired</h3>
              <p class="lead">Get the inspiration from our world class designers</p>
              <div id="get-inspired" class="owl-carousel owl-theme">
                <div class="item"><a href="#"><img src="img/getinspired1.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="img/getinspired2.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="img/getinspired3.jpg" alt="Get inspired" class="img-fluid"></a></div>
              </div>
            </div>
          </div>
        </div>-->
        
        <div class="box text-center">
          <div class="container">
            <div class="col-md-12">
              <h3 class="text-uppercase">From our blog</h3>
              <p class="lead mb-0">Get our new update <a href="blog.php">Check our blog!</a></p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="col-md-12">
            <div id="blog-homepage" class="row">
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href="post.html">Twin Charge Machinery</a></h4>
                  <!--<p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a></p>-->
                  <hr>
                  <p class="intro">Twin Charge tiles have very long life compared to traditional Soluble Salt tiles. Very good for place which has heavy wear and tear. Twin-Charge gives benefits of both Double Charge and GVT, because it has strength of Double Charge and Beauty of Glazed Vitrified Tiles.</p>
                  <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href="post.html">Digital Tiles</a></h4>
                  <!--<p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a></p>-->
                  <hr>
                  <p class="intro">digital tiles are also type of vitrified tiles its digital printed tiles unlimited design possibilities, high resolution printing and sharper finishes, vitrified tiles in various styles have started to become the ceramic art . Vitrified tile is a ceramic tile with very low porosity.</p>
                  <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
   
	   <?php require('footer.php')?>
	  
	  
	  
    <!-- JavaScript files-->
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