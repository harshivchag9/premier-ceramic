<?= session_start()?>

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
    
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.ico">
	   <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
      function notlogged()
      {
        var check = confirm("Please Login\nyou can not able to add product in cart without login ");
  			 if(check == true)
        {
		  	  document.getElementById("login").click();
  			}
      }
    </script>
    
  </head>
  <body onLoad="load();">
	  <script type="text/javascript">
	  	function load()
			{
				document.getElementById('navcategory').className='nav-link active';
			}
	  </script>
    <?php require('header.php')?>
    <br>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
				      <?php require('menufilter.php')?>
            </div>
            <div class="col-lg-9">
				      <div id="disp_data" class="row products"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require('footer.php')?>
   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script> 
    <script src="js/refresh.js"></script> 
    <script src="js/FilterProduct.js"></script>
  	<script src="js/jquery-3.1.1.min.js"></script>
  </body>
</html>
