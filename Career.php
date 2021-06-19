
<?php
	
// 	$dbcon=mysqli_connect('localhost','root','','premierdb');
	
// 	$r=rand(1111,9999).rand(1111,9999);
// 	$r=md5($r);
// 	if(isset($_POST['resume'])){
// 	$name = $_FILES['resume']['name'];
// 	$des = "img/resume/".$r.$name;
	
// 	$filename = $_FILES['video_file']['name'];
// 	$ext = pathinfo($filename, PATHINFO_EXTENSION);
// 	if( $ext !== 'pdf' ) {
// 		//header("location:../Career.php");
// 	}
// 	else{
	
// 	move_uploaded_file($_FILES['resume']['tmpname'],'../'.$des);
	
// 	$qry = "INSERT INTO `career`(`id`, `fname`, `lname`, `email`, `date`, `resume_file`) VALUES ('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[bdate]','$des')";
	
// 	header('location:../Career.php');
 	?>
<!-- <script type="text/javascript">alert('hello');</script> -->
<?php
// 	}}
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
	<?= require('header.php') ?>
  <div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <h1>Career</h1>
              <hr>
              <form name="resume" id="resume" enctype="multipart/form-data" method="post" >
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type='text' placeholder="Frist Name" name="fname" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type='text' placeholder="Last Name" name="lname" class="form-control" >
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type='email' placeholder="Email Id" name="E_mail" class="form-control" >
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <!--<input type="date" placeholder="Date Of Birth" name="dob" class="form-control" >-->
                    <input type='file' placeholder="" name="Upload" class="form-control" >
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="submit" placeholder="" onClick="SendResume();" name="ins" class="btn btn-primary" >
                  </div>
                </div>
              </div>
              </form>
				
              <script type="text/javascript">
              
                function SendResume()
                {
                  var form = $('#resume')[0];
                  var data = new FormData(form);
                  $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "php/addcareer.php",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function (data) 
                    {
                      alert('Resume Send!!');
                    },
                    error: function (e) 
                    {
                      alert('something want wrong!!!');
                    }
                  });
                }
              </script>
            </div>
			    </div>  
        </div>
      </div>
    </div>
  </div>
  
  <?= require('footer.php') ?>
   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
    	
  </body>
</html>