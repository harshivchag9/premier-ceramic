<?php
session_start();
if(!isset($_SESSION['userData']))
{
	header("location:index.php");
}

if(isset($_POST['submit']))
{
	require_once("database/database.config.php");
	$sql = Database::getConnection();

	$userId =$_SESSION['loggeduserid'];
	$password=$_POST['password'];
	$oldPassword = $_POST['oldPassword'];
	$confirmPassword=$_POST['confirmPassword'];

	if($response = $sql->query("SELECT * FROM `registration` WHERE `registration`.`user_id` = '$userId' LIMIT 1"))
	{
		$data = $response->fetch_assoc();
		if($data['pswrd'] === base64_encode($oldPassword) )
		{
			if($password==$confirmPassword){
				$password=base64_encode($password);
				$sql->query("UPDATE `registration` SET `pswrd`='$password' WHERE `registration`.`user_id`='$userId'");
				$_SESSION[ 'message' ] = "Password changed successfully";

			}else{
				$_SESSION[ 'message' ] = "Password does not match";
				header( "location:changepassword.php" );
				exit;
			}
		}
		else
		{
			$_SESSION[ 'message' ] = "Incorrect Password";
			header( "location:changepassword.php" );
			exit;
		}
	}
	else
	{
		$_SESSION[ 'message' ] = "Something went wrong! please try after sometime";
		header( "location:changepassword.php" );
		exit;
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
	<script src="vendor/jquery/jquery.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			

				$("#show-password").change(function(){
					if($(this).prop("checked")) 
					{
						$("#oldPassword").prop("type", "text");
						$("#password").prop("type", "text");
						$("#confirmPassword").prop("type", "text");
					}
					else
					{
						$("#oldPassword").prop("type", "password");
						$("#password").prop("type", "password");
						$("#confirmPassword").prop("type", "password");
					}
				});
			});
	</script>
</head>
<body>
	
	
	<?php require('header.php')?>
	<br>
	<div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
					<form action='changepassword.php' class="form-control" method='post'>




					
						<table >
						<p class="text-left" style="color: red;">
                                        <strong>
                                            <?php 
                                                echo isset($_SESSION['message'])?$_SESSION['message']:"";
                                                unset($_SESSION['message']);
                                            ?> 
                                        </strong>
                                    </p>
							<tr>
								<td>Old Password :</td>
								<td><input type='password' class="form-control" name='oldPassword' id="oldPassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  /></td>
							</tr>
							<tr>
								<h1>Change Password<h1>
								<td>password :</td>
								<td><input type='password' class="form-control" name='password' id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  /></td>
							</tr>
							<tr>
								<td>Conform Password :</td>
								<td><input type='password' class="form-control" name='confirmPassword' id="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="checkbox" id="show-password"> <label for="show-password">Show Password</td>
							</tr>
							<tr>
								<td></td>
								<td><input type='submit' class="btn btn-primary" name='submit' value='Submit'/></td>
							</tr>
							
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php require('footer.php')?>
</body>
</html>
