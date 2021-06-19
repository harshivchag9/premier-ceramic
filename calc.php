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
<body>
    
	 <?php require('header.php')?>
	<br>
	
  <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <!-- <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
                  </ol>
              </nav>
            </div> -->
            <div class="col-lg-12">
              <div class="box">
                <h1>Tiles Calculator</h1>
                <p class="lead">Enter size in feet.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
              <form>
                <div class="col-md-6">
                  <div class="form-group">
                    <input name="tilesize" id="tilesize" type="number" class="form-control" placeholder="Tiles Size">
                    <select class="form-control" id="form1">
                      <option value="feet">Feet</option>
                      <option value="mm">mm</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"> 
                    <input name="totelarea" id="totelarea" type="number" class="form-control" placeholder="Totel Area In Feet">
                    <select class="form-control" id='form2'>
                      <option value="squarefeet">SquareFeet</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"> You need Totel 
                    <label class="form-control" name="peice" id="peice" >0</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="button" class="btn btn-primary" value="calculate" onClick="calculate();">										
                  </div>
                </div>
							</form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <?php require('footer.php')?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="js/front.js"></script>
    <script type="text/javascript">
	
      function calculate(){
        
        var a = document.getElementById('tilesize').value;
        var b = document.getElementById('totelarea').value;
        
        var c = Number(b) / Number(a);
        document.getElementById('peice').innerHTML = c;
        
        if(document.getElementById('form1').value=='feet'){
          var c = Number(b) / Number(a);
          document.getElementById('peice').innerHTML = c;
        }
        else if(document.getElementById('form1').value=='mm'){
          b=Number(b)*304.8;
          console.log(b);
          var c = Number(b) / Number(a);
                  console.log(c);
          var c1 = Number(c)/304.8;	
          //Math.ceil(c1);
          console.log(c1);

          document.getElementById('peice').innerHTML = c;
        }else{
          console.log('select feild');
        }
        
      }
	
	</script>
	
</body>
</html>