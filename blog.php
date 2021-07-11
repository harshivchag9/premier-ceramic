<?php session_start(); ?>
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
  <?php require('header.php')?>
  <br>
  <div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
            <div id="blog-listing" class="col-lg-9">
              <div class="box">
                <h1>Blog</h1>
              </div>	
              <!-- post-->
        <?php 
          require_once("database/database.config.php");
          $sql = Database::getConnection();
          $res=$sql->query('select *from blog');
          while($row=mysqli_fetch_assoc($res))
          {			
				?>
              <div class="post">
                <h2><a><?php echo $row['title']; ?></a></h2>
                <!--<p class="author-category">By <a href="#">J</a> in <a href="">Fashion and style</a></p> -->
                <hr>
                <p class="date-comments"><a><i class="fa fa-calendar-o"></i><?php echo $row['date'];?></a><!--<a><i class="fa fa-comment-o"></i> 8 Comments</a>--></p>
                <div class="image"><a><img width="1020px" height="575px" src="<?php echo $row['blogimage']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid"></a></div>
                <br><p  class="intro"><?php  echo $row['description']; ?></p>
                <!-- <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
                </div>
                <div class="pager d-flex justify-content-between">
                  <div class="previous"><a href="#" class="btn btn-outline-primary">← Older</a></div>
                  <div class="next disabled"><a href="#" class="btn btn-outline-secondary disabled">Newer → </a></div>
                </div> -->
              </div>
				      <br><br><br><br>
        <?php  
          } 
        ?>
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
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/front.js"></script>
  </body>
</html>