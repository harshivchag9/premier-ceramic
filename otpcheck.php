<?php
	session_start();
	$serverotp = $_SESSION['otp'];
	if(isset($_POST['submit']))
	{
		$otp=$_POST['otp'];
		if($otp==$serverotp)
		{
			header('location:changepassword.php');
		}
		else
		{
			echo "OTP is not valid";
			//unset ($_SESSION['email']);
			//header('registration.php');
		}
	}
?>
<!DOCTYPE HTML>
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
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
	<?= require('header.php')	?>
	<div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
					<form action='#' class="form-control" method='post'>
						<table >
							<h1>Check One Time Password<h1>
							<tr>
								<td>OTP :</td>
								<td><input type='text' class="form-control" name='otp' pattern="[1-9][0-9]{3}" maxlength="4" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type='submit' class="btn btn-primary" name='submit' value='Submit'/></td>
							</tr>
						</table>
						<hr>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?=require('footer.php')?>
</body>
</html>
