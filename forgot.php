<?php
	session_start();
	require 'PHPMailer/PHPMailerAutoload.php';
	require_once("database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if(!$sql)
	{
		die('Could not Connect My Sql:' .mysql_error());
	}

	if(isset($_POST['submit']))
	{
		ini_set('SMTP',"smtp.gmail.com");
		ini_set('smtp_port', "587");
		$user_id = $_POST['Email'];
    	$result = $sql->query("SELECT * FROM registration where email='" . $_POST['Email'] . "'");
    	$row = mysqli_fetch_assoc($result);
		$fetch_user_id=$row['email'];
		ini_set('sendmailfrom', $fetch_user_id);
		$username=$row['username'];
		$email=$row['email'];
		$OTP=rand(1000,9999);
		$message='';
		$_SESSION['email']=$user_id;
		$_SESSION['otp']=$OTP;
		if($user_id==$fetch_user_id) 
      	{
			$mail = new PHPMailer;
			$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'premierceramicjam@gmail.com';          // SMTP username
			$mail->Password = 'Harshivchag@1'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 // TCP port to connect to

			$mail->setFrom($fetch_user_id,$username );
			$mail->addReplyTo($fetch_user_id, $username);
			$mail->addAddress($email);   // Add a recipient
			$mail->isHTML(true);  // Set email format to HTML

			$bodyContent = '<h1>Sending Email From LocalHost</h1>';
			$bodyContent .= $OTP;

			$mail->Subject = 'Email';
			$mail->Body    = $bodyContent;
			if(!$mail->send()) 
			{
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} 
			else 
			{
				echo 'Message has been sent';
				header('location:otpcheck.php');
			}
		}
		else
		{
			$message='invalid username';
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
	<?=require('header.php')?>
	<div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
					<h1 class="form-control">Forgot Password<h1><br>
					<p class="text-left"  style="color: red; font-size:15px;"><strong><?=  isset($message)?$message:"" ?></strong></p>
					<p style="font-size:20px;	">enter your valid email address:</p>
					<form action='#<strong></strong>' method='post'>
						<table cellspacing='5' align='center' >
							<tr>
								<td ></td>
								<td><input class="form-control" type='text' name='Email'/></td>
							</tr>
							<tr>
								<td></td>
								<td><input class="btn btn-primary" class="btn btn-primary" type='submit' name='submit' value='Submit'/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
<?=require('footer.php')?>

</body>
</html>
