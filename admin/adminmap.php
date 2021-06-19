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
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="../favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
   
	<style>
      #map {
        height: 750px%;
		width: 1500px;
      }
		#fetcheddata ,#allfetcheddata{
			display: none;
		}
    </style>
</head>
<body>
    
	<div id="all" style="margin-top: 70px;">
      <div id="content">
        <div class="container">
          <div class="row">
                    
                    <div class="col-lg-6 col-xl-12">
                        <div class="box" >
                         <div class="form-group">
						   <div class="row" style="height: 750px; ">
	 							<?php 
									require('php/map/mapdata.php');
									$map = new mapdata;
									$row = $map->getdata();
									$row = json_encode($row ,true);
									echo '<div id="fetcheddata">'.$row.'</div>';

									$row1 = $map->Allgetdata();
									$row1 = json_encode($row1 ,true);
									echo '<div id="allfetcheddata">'.$row1.'</div>';

								?>
							   <div id="map"></div>
							   <input type="button" id="reloadpageonce" style="display: none;" >
							 </div>
						</div>						
                        </div>	
                    </div>
			</div>
            </div>
        </div>
    </div>  
							   						
	 						
 
						  
							   
							   
	
	
	<script src="js/googlemap.js"></script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiZFuWkyPshZe-i0FqRXK0RM_rb9-uLqM&callback=LoadMap">
    </script>
	
	
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
	 
</body>
</html>