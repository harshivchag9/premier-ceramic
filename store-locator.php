<?php session_start(); ?>
<!DOCTYPE html >
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
    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">-->
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 600px;
		width: 1200px;
		margin-left: 70px;
		border: solid #9BDCED;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
		#fetcheddata ,#allfetcheddata{
			display: none;
		}
    </style>
  </head>

<html>
  <body>
	  
	  <?php require('header.php') ?>
	  
	  <div id="all" s>
      <div id="content">
        <div class="container">
          <div class="row">
			   <div class="col-lg-6 col-xl-12">
                        <div class="box" >
                         <div class="form-group">
						   <div class="row">
                    							 <div id="map"></div>
							 
							 </div></div></div></div>

                    <div class="col-lg-6 col-xl-12">
                        <div class="box" >
                         <div class="form-group">
						   <div class="row">
    						
							   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
                <select id="country" onChange="Change_Country();" class="form-control">
							    <option >Select Country</option>
                    <?php
                      require_once("database/database.config.php");
                      $db = new Database();
                      $sql = Database::getConnection();
                      $res=$sql->query("SELECT DISTINCT(`Country`) FROM store ORDER BY `Country`");
                      while($row = mysqli_fetch_array($res))
                      {
                        echo '<option value="'.$row['Country'].'">'.$row['Country'].'</option>';
                      }
                    ?>
                </select>
							   
							   <div id="divstate" class="form-control">
								   <select id="state" class="form-control">
							   		<option value=""></option>
							   		</select>
							   </div>
							   <div id="divcity" class="form-control"><select id="city" class="form-control">
							   		<option value=""></option>
							   </select></div>
							   <div id="divname" class="form-control"><select id="name" class="form-control">
							   		<option value=""></option>
							   </select></div>
							   <div id="divbtn"><input type="button" value="Find Store" class="btn btn-primary" onClick="NotSelected()"></div>
						   </div>
						</div>						
          </div>	
        </div>
     </div>
  </div>
</div>
</div>  
  
	  <?php require('footer.php') ?>
		<!--AIzaSyDWko3dvHe3QE_OSMJaPy2TptW19HzQrkg-->
	<script src="js/googlemap.js"></script>
    
	  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiZFuWkyPshZe-i0FqRXK0RM_rb9-uLqM&callback=LoadMap"
        async defer></script>
	   <script src="vendor/jquery/jquery.min.js"></script>
  </body>
</html>