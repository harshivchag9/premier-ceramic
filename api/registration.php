<?php
session_start();
$_SESSION[ 'message' ] = '';
$_SESSION[ 'message1' ] = '';




require_once("../database/database.config.php");
$sql = Database::getConnection();

$inusername = $_POST[ 'fullname' ];

$inemail = $_POST[ 'emailid' ];
$inpassword = base64_encode( $_POST[ 'password' ] );
$incfrmpassword = base64_encode( $_POST[ 'conformpassword' ] );
if ( !$sql ) {
	echo( "connaction error" );
	header( "location:404.html" );
} else {
	
	if ( $inpassword === $incfrmpassword ) 
	{
		$cquery = "select *from registration where email = '$inemail'";
		$result = $sql->query($cquery );
		$numberofrow = mysqli_num_rows( $result );

		if ( $numberofrow > 0 ) {
			$_SESSION[ 'message' ] = 'Account already exist!';
			header( "location:../register.php" );
		} else {
			$insertquery = "INSERT INTO registration (username,email,pswrd,role) VALUES('$inusername','$inemail','$inpassword','user')";
			$insertcheck =  $sql->query( $insertquery );
			$_SESSION[ 'message' ] = "Registration Succesfully !";
			header( "location:../register.php" );
			
		}
	} 
	else 
	{
		$_SESSION[ 'message' ] = 'Password do not Match!';
		header( "location:../register.php" );
	}	
	mysqli_close($dbcon);
}
?>