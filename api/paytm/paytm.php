<?php
session_start();
require_once("../../database/database.config.php");
$sql = Database::getConnection();

$query="SELECT * FROM orderproduct WHERE user_id=$_SESSION[loggeduserid] AND status='payment'";
$response=$sql->query($query);
while($row = $response->fetch_assoc()){
	$orderid=$row['orderid'];
}

$ship=0;$count=0;$delivery=0;$total=0;

if(isset($_SESSION['loggeduserid']))
  {
			
			$response=$sql->query("select * from cart WHERE User_id = $_SESSION[loggeduserid]");
			$row = "";
			while($row = $response->fetch_array())
			{
				$count++;		
				$row1=$sql->query("select * from product_detail WHERE product_id = $row[Product_id]")->fetch_array();

					$total = $total + ($row['quantity']*$row1['price']);
					$tax = $total*18.00/100;
					$delivery=$delivery+($row['quantity']*15);
					$finalvalue = $total+$tax+$delivery;
					$ship = $ship + ($row['quantity']*15);
			}   
  }


?>



		
<form method="post" action="PaytmKit/pgRedirect.php" name="rdirect">
		
					
	<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php $a=substr($_SESSION['orderid'],0,16); echo $a; ?>">
	
	<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($_SESSION['loggeduserid'])){echo $_SESSION['loggeduserid'];} ?>">

	<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">

	<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
		size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
	
	<input type="hidden" title="TXN_AMOUNT" tabindex="10"
			name="TXN_AMOUNT"
		value="<?php if(isset($finalvalue)){echo $finalvalue; } ?>">
	
	<input value="CheckOut" type="submit" 	onclick="">
		
	</form>


<script type="text/javascript">
		document.rdirect.submit();
</script>