<?php

session_start();
$_SESSION[ 'loginmsg' ] = '';
require_once("database/database.config.php");
$db = new Database();
$sql = Database::getConnection();




if ( !$sql ) {
	alert( "Connection Error" );
}


$loginemail = $_POST[ 'emailid' ];
$loginpassword = base64_encode( $_POST[ 'password1' ] );
$loginvalidationquery = $sql->query("select *from registration where pswrd = '$loginpassword' AND email = '$loginemail' LIMIT 1" );
$logincheck = mysqli_num_rows( $loginvalidationquery ); 
if ( $logincheck === 1 ) 
{
	$username=$sql->query("select user_id,role from registration where email = '$loginemail' AND pswrd = '$loginpassword'");
	$_SESSION['loggedusername']=$sql->query("select username from registration where email = '$loginemail' AND pswrd = '$loginpassword'");
	while($name=mysqli_fetch_assoc($username))
	{
		$_SESSION['loggeduserid'] = $name['user_id'];
		if($name['role']=='user')
		{
			$_SESSION[ 'loginmsg' ] = 'Login successfully';
			header( "location:index.php" );
		}
		else if($name['role']=='admin'){
			header("location:admin/index.php");
		}
		else if($name['role']=='admin')
		{
			
		}
	}
} 
else 
{
	$_SESSION[ 'loginmsg' ] = "login fail!";
	header( "location:register.php" );
}


?>