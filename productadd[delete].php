<?php

$dbcon = mysqli_connect( 'localhost',"root","","premierdb" ) or die(mysqli_error($dbcon));


	if(isset($_POST["upload"]))
	{
		$v1 = rand(1111,9999);
		$v2 = rand(1111,9999);
	
		$v3 = $v1 . $v2;
		$v3 = md5($v3); 
		$fnm=$_FILES["uimage"]["name"];
		$des="./tiles/".$v3.$fnm;
		$des1="tiles/".$v3.$fnm;
		move_uploaded_file($_FILES["uimage"]["tmp_name"],$des); 
		
		mysqli_query($dbcon,"INSERT INTO `product_detail`( `product_name`, `color`, `type`, `usage`, `stock`, `price`, `pieceinbox`, `weight`, `thickness`, `size`, `description`, `productimg`, `imgname`)  VALUES('$_POST[productname]','$_POST[color]','$_POST[type]','$_POST[use]',$_POST[stock],$_POST[price],$_POST[piece],$_POST[weight],'$_POST[thickness]','$_POST[size]','$_POST[description]','$des1','$v3')");
		
	}
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
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
    <!-- navbar-->
    <?php 
    require('header.php')
     ?>
    
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-xl-12">
                        <div class="box">
                          <h1>Add Product</h1>
						<hr>
							
							
     <!---------------------------------------------------                 ------------------------------------>
							
							
                <form action="productadd.php" name="product_add" method="post" enctype="multipart/form-data" >
                                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"> Product Name
                        <input name="productname" type="text" class="form-control">
						</div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> Color
                        <input name="color" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> Type <br>
                        
						  <table>
							<tr>
  								<td><input type="radio" name="type" value="Double Charge"></td>
    							<td>&nbsp; Double Charge &nbsp;</td>
								
								<td><input type="radio" name="type" value="Digital Tiles"></td>
    							<td>&nbsp; Digital Tiles</td>	
							</tr>
							<tr>
    							<td><input type="radio" name="type" value="GVT"></td>
    							<td>&nbsp; GVT </td>
								
								<td><input type="radio" name="type" value="PGVT"></td>
    							<td>&nbsp; PGVT</td>
								
							</tr>
						</table>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> Usage
						  <table>
							<tr>
  								<td><input type="radio" name="use" value="wall tiles"></td>
    							<td>&nbsp; Wall Tiles &nbsp;</td>
								
								<td><input type="radio" name="use" value="floor tiles"></td>
    							<td>&nbsp; Floor Tiles</td>
								<td><input type="radio" name="use" value="parking tiles"></td>
    							<td>&nbsp; Parking Tiles</td>
								
								
							</tr>
							<tr>
    							<td><input type="radio" name="use" value="alivation tiles"></td>
    							<td>&nbsp; Alivation Tiles &nbsp; </td>
								
								<td><input type="radio" name="use" value="kitchen tiles"></td>
    							<td>&nbsp; Kitchen Tiles</td>
								
								
							</tr>
						</table>
                        
                      </div>
                    </div>
									<div class="col-md-6">
                      <div class="form-group"> Stock
                        <input name="stock" type="number" class="form-control">
                      </div>
                    </div>
									<div class="col-md-6">
                      <div class="form-group"> Price
                        <input name="price" type="number" class="form-control">
                      </div>
                    </div>
									<div class="col-md-6">
                      <div class="form-group"> Piece
                        <input name="piece" type="number" class="form-control">
                      </div>
                    </div>
									<div class="col-md-6">
                      <div class="form-group"> Weight
					<input name="weight" type="number" class="form-control">
                      </div>
                    </div>
									<div class="col-md-6">
                      <div class="form-group"> Thickness
                        <table>
							<tr>
  								<td><input type="radio" name="thickness" value="8mm"></td>
    							<td>&nbsp; 8mm &nbsp;</td>
								
								<td><input type="radio" name="thickness" value="10mm"></td>
    							<td>&nbsp; 10mm </td>
								
								
							</tr>
							
						</table>
					</div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group"> Size
                       <table>
							<tr>
  								<td><input type="radio" name="size" value="12x18"></td>
    							<td>&nbsp; 12x18 &nbsp;</td>
								
								<td><input type="radio" name="size" value="12x12"></td>
    							<td>&nbsp; 12x12 </td>
								
								
							</tr>
							<tr>
    							<td><input type="radio" name="size" value="300x300"></td>
    							<td>&nbsp; 300x300 </td>
								
								<td><input type="radio" name="size" value="1200x1200"></td>
    							<td>&nbsp; 1200x1200</td>
								
							</tr>
						</table>
</div>
                    </div>
									
                    <div class="col-md-12 col-xl-12">
                      <div class="form-group"> Description
                        <textarea cols="" rows="6" name="description" class="form-control"></textarea>
                      </div>
                    </div>
									
					<div class="col-md-6">
                      <div class="form-group"> Product Image
                        <input name="uimage" type="file" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <input type="submit" name="upload" class="btn btn-primary" value="ADD PRODUCT"><i class="glyphicon glyphicon-floppy-saved"></i>
                    </div>
                  </div>
                  <!-- /.row-->
                </form>
                        </div>
                    </div>
			</div>
            </div>
        </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/front.js"></script>
</body>
</html>