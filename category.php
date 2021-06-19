<?php session_start()?>

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
