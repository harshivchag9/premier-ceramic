<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

print_r($_SESSION);
require_once("../../../database/database.config.php");
$sql = Database::getConnection();
$query="INSERT INTO `Payment`(`ORDERID`, `TXNID`, `TXNAMOUNT`, `PAYMENTMODE`, `CURRENCY`, `TXNDATE`, `STATUS`, `RESPCODE`, `RESPMSG`, `GATEWAYNAME`, `BANKTXNID`, `BANKNAME`, `CHECKSUMHASH`) VALUES ('$_POST[ORDERID]','$_POST[TXNID]',$_POST[TXNAMOUNT],'$_POST[PAYMENTMODE]','$_POST[CURRENCY]','$_POST[TXNDATE]','$_POST[STATUS]','$_POST[RESPCODE]','$_POST[RESPMSG]','$_POST[GATEWAYNAME]','$_POST[BANKTXNID]','$_POST[BANKNAME]','$_POST[CHECKSUMHASH]')";
$sql->query($query);

if($_POST['STATUS']==='TXN_SUCCESS'){
	// mysqli_query($dbcon,"DELETE FROM `orderproduct` WHERE `orderproduct`.`orderid` = $_POST[ORDERID]");
	$sql->query("UPDATE `orderproduct` SET `status` = 'Placed', payment=1 WHERE `orderproduct`.`orderid`='$_POST[ORDERID]'");
	$sql->query("UPDATE `payment` SET `orderstatus` = 'Placed' WHERE `payment`.`ORDERID`='$_POST[ORDERID]'");
	header("location:../../../checkout.php?status=success");
}else{
	$sql->query("UPDATE `orderproduct` SET `status` = 'Failed' WHERE `orderproduct`.`orderid`='$_POST[ORDERID]'");
	$sql->query("UPDATE `payment` SET `orderstatus` = 'Failed' WHERE `payment`.`ORDERID`='$_POST[ORDERID]'");
	header("location:../../../checkout.php?status=fail");
}

?>