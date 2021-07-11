<?php 
  session_start(); 
  require_once("database/database.config.php");
  $sql = Database::getConnection();
	$res = $sql->query("SELECT * FROM `contactdetail`");
	$row = mysqli_fetch_assoc($res);
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
    <link rel="shortcut icon" href="favicon.ico">
  </head>
  <body>
  <?php require('header.php') ?>
  <br>
  <div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Contact</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-3">
            <div class="card sidebar-menu mb-4">
              
            </div>
              <!-- *** PAGES MENU END ***-->
            <div class="banner"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></div>
          </div>
          <div class="col-lg-9">
            <div id="contact" class="box">
              <h1>Contact</h1>
              <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
              <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
              <hr>
              <div class="row">
                <div class="col-md-4">
                  <h3><i class="fa fa-map-marker"></i>Address</h3>
                  <p><?= $row['address1'] ?><br><?= $row['address2'] ?><br><?= $row['address3'] ?><br><strong><?= $row['address4'] ?></strong></p>
                </div>
                <div class="col-md-4">
                  <h3><i class="fa fa-phone"></i> Call center</h3>
                  <p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                  <p><strong>+91-<?= $row['callcenternumber'] ?></strong></p>
                </div>
                <div class="col-md-4">
                  <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                  <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                  <ul>
                    <li><strong><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></strong></li>
                  </ul>
                </div>
              </div>
              <hr>
              <div id="map" class="table-responsive">
				        <?= $row['addressmap'] ?>
				      </div>
              <hr>
              <h2>Contact form</h2>
              <form method="post" action="api/contact-inquiry.php" >
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstname">Firstname</label>
                      <input name="firstname" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastname">Lastname</label>
                      <input name="lastname" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input name="email" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="subject">Subject</label>
                      <input name="subject" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea name="message" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
                  </div>
                </div>
              </form>
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
  <script src="js/front.js"></script>
    	
  </body>
</html>