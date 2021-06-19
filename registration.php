<?php
session_start();
$_SESSION[ 'message' ] = '';
$_SESSION[ 'message1' ] = '';

$unm = 'root';
$pswd = '';
$dbt = 'premierdb';
$dbcon = mysqli_connect( 'localhost', $unm, $pswd );
mysqli_select_db( $dbcon, $dbt );

$inusername = $_POST[ 'fullname' ];

$inemail = $_POST[ 'emailid' ];
$inpassword = base64_encode( $_POST[ 'password' ] );
$incfrmpassword = base64_encode( $_POST[ 'conformpassword' ] );
if ( !$dbcon ) {
	echo( "connaction error" );
	header( "location:404.html" );
} else {
	
	if ( $inpassword === $incfrmpassword ) 
	{
		$cquery = "select *from registration where email = '$inemail'";
		$result = mysqli_query( $dbcon, $cquery );
		$numberofrow = mysqli_num_rows( $result );

		if ( $numberofrow === 1 ) {
			$_SESSION[ 'message' ] = 'Account already exist!';
			header( "location:register.php" );
		} else {
			$insertquery = "INSERT INTO registration (username,email,pswrd,role) VALUES('$inusername','$inemail','$inpassword','user')";
			$insertcheck = mysqli_query( $dbcon, $insertquery );
			header( "location:register.php" );
			$_SESSION[ 'message' ] = "Registration Succesfully !";
			
		}
	} 
	else 
	{
		$_SESSION[ 'message' ] = 'Password do not Match!';
		//			echo "password do not match";
		header( "location:register.php" );
	}	
	mysqli_close($dbcon);
}
?>