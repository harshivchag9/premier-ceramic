<?php
	session_start();
	require_once("database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if(isset($_POST['submit']))
	{
	
		$id=$_SESSION['loggeduserid'];
		$newpassword=$_POST['newpassword'];
		$newpassword=md5($newpassword);
		$oldpassword=$_POST['oldpassword'];
		$oldpassword=md5($oldpassword);
		$cnfpassword=$_POST['cnfpassword'];
		$cnfpassword=md5($cnfpassword);
		$checkpassword='';
	
		if($newpassword===$cnfpassword)
		{
			if(isset($_SESSION['loggeduserid']))
			{
				$result=$sql->query("select *from registration where user_id=$id");
				$row=mysqli_fetch_array($result);
				if ( $row['pswrd'] === $oldpassword ) 
				{
					$sql->query("UPDATE `registration` SET `pswrd`='$newpassword' WHERE user_id=$_SESSION[loggeduserid]");
					header("location:logout.php");
					header("location:register.php");
				}
				else
				{
					$_SESSION['changepasswordmsg']="please enter correct password";
				}
			}
		}
		else
		{
			$_SESSION['changepasswordmsg']="conform password does not match";
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
	<?=require('header.php')?>
	<div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
						
					<?php	
						if(isset($_SESSION['loggeduserid']))
						{   
					?>
						<form action='#' class="form-control" method='post'>
							<h1>Check One Time Password<h1>
							<table >
								<tr>
									<p><?= isset($_SESSION['changepasswordmsg'])?$_SESSION['changepasswordmsg']:""  ?></p>
									<td>Old Password :</td>
									<td><input type='password' class="form-control" name='oldpassword'  /></td>
								</tr>
								<tr>
									<td>New Password :</td>
									<td><input type='password' class="form-control" name='newpassword'  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  /></td>
								</tr>
								<tr>
									<td>Conform Password :</td>
									<td><input type='password' class="form-control" name='cnfpassword'  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type='submit' class="btn btn-primary" name='submit' value='Submit'/></td>
								</tr>
							</table>
							<hr> 
						</form>
					<?php	
						}
					?>
							
				</div>
			</div>
		</div>
	</div>
			
			<?=require('footer.php')?>
	
</body>
</html>
