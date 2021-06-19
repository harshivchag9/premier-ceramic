<?php 
    session_start();
	require_once("database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if(isset($_SESSION['loggeduserid'])){
		
		$quary="INSERT INTO `address`(`orderid`, `fristname`, `lastname`, `houseno`, `street`, `city`, `zipcode`, `state`, `country`, `phone`, `email`) VALUES ('$_SESSION[orderid]','$_POST[firstname]','$_POST[lastname]','$_POST[house]','$_POST[street]','$_POST[city]',$_POST[zip],'$_POST[state]','$_POST[country]',$_POST[phone],'$_POST[email]')";
		
		$sql1=$sql->query($quary);
		$a=substr($_SESSION['orderid'],0,16);
		if(isset($sql1)){
			$sql->query("UPDATE `orderproduct` SET `status` = 'payment' WHERE `orderproduct`.`orderid`='$a'");
		}
		header("location:../payment.php");
		
	}
?>


