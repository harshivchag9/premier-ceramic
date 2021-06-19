<?php


session_start();
if(isset($_POST['submit'])){
	require_once("database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	$email=$_SESSION['loggeduserid'];
	$password=$_POST['password'];
	$conformpassword=$_POST['cfmpassword'];
	if($password==$conformpassword){
		$password=base64_encode($password);
		$sql->query("UPDATE `registration` SET `pswrd`='$password' WHERE `registration`.`user_id`='$email'");
		//header("location:register.php");
	}else{
		echo "pasword does not match";
		return;
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
							<tr>
								<h1>Change Password<h1>
								<td>password :</td>
								<td><input type='text' class="form-control" name='password'  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  /></td>
							</tr>
							<tr>
								<td>Conform Password :</td>
								<td><input type='text' class="form-control" name='cfmpassword'  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
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
