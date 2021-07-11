<?php

session_start();
$_SESSION[ 'loginmsg' ] = '';
require_once("../database/database.config.php");
$sql = Database::getConnection();




if ( !$sql ) {
	alert( "Connection Error" );
}


$loginemail = $_POST[ 'emailid' ];
$loginpassword = base64_encode( $_POST[ 'password1' ] );

$response = $sql->query("select user_id,role,username,email from registration where pswrd = '$loginpassword' AND email = '$loginemail' LIMIT 1" );

$logincheck = $response->num_rows; 
if ( $logincheck === 1 ) 
{
	$username=$sql->query("select user_id,role,username from registration where email = '$loginemail' AND pswrd = '$loginpassword'");
	
	if($row = $response->fetch_assoc()){
		$_SESSION['userData']= $row;
		$_SESSION['loggeduserid'] = $row['user_id'];
		if($row['role']=='user')
		{
			$_SESSION[ 'loginmsg' ] = 'Login successfully';
			header( "location:../index.php" );
		}
		else if($row['role']=='admin'){
			header("location:../admin/index.php");
		}
		else if($row['role']=='marketing')
		{
			header("location:../admin/index.php");
		}
		else if($row['role']=='production')
		{
			header("location:../admin/index.php");
		}
	}
} 
else 
{
	$_SESSION[ 'loginmsg' ] = "login fail!";
	header( "location:../register.php" );
}


?>