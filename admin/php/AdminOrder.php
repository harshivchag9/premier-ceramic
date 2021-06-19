
<div id="Order_Address" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Address</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>
              </div>
              <div class="modal-body">
				
					<table >
						<tbody>
							<tr>
								<td><label><b>Address Id :</b></label> </td>
								<td><label id='addid'></label> </td>
							</tr>
							<tr>
								<td><label><b>Order Id :</b></label> </td>
								<td><label id='addorderid'></label> </td>
							</tr>
							<tr>
								<td><label><b>Frist Name :</b></label></td>
								<td><label id='addfname'></label> </td>
							</tr>
							<tr>
								<td><label><b>Last Name :</b></label> </td>
								<td><label id='addlname'></label></td>
							</tr>
							<tr>			
								<td><label><b>House No. :</b></label> </td>
								<td><label id='addhouse'></label> </td>
							</tr>
							<tr>
								<td><label><b>Street :</b></label> </td>
								<td><label id='addstreet'></label> </td>
							</tr> 						  				
							<tr>
								<td><label><b>City :</b></label> </td>
								<td><label id='addcity'></label> </td>
							</tr>
							<tr>
								<td><label><b>Zip Code :</b></label> </td>
								<td><label id='addzipcode'></label> </td>
							</tr> 			
							<tr>
								<td> <label><b>State :</b></label> </td>
								<td><label id='addstate'></label> </td>
							</tr>
							<tr>
								<td><label><b>Country :</b></label> </td>
								<td><label id='addcountry'></label> </td>
							</tr>
							<tr>
								<td><label><b>Phone No. :</b></label> </td>
								<td><label id='addphone'></label> </td>
							</tr>  					
							<tr>
								<td><label><b>Email :</b></label>	 </td>
								<td><label id='addemail'></label> </td>
							</tr>
						</tbody>
					</table>				  
				  <!--	<input type="hidden" name="imagepath" id="imagepath" value="" > -->
              </div>
            </div>
          </div>
        </div>
<div id="Order_Payment" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Payment</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>
              </div>
              <div class="modal-body">
				
					<table >
						<tbody>
							<tr>

								<td><label><b>Payment Id :</b></label> </td>
								<td><label id='payid'></label> </td>
							</tr>
							<tr>
								<td><label><b>Order Id :</b></label> </td>
								<td><label id='payorderid'></label> </td>
							</tr>
							<tr>
								<td><label><b>Transaction Id :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label></td>
								<td><label id='paytranid'></label> </td>
							</tr>
							<tr>
								<td><label><b>Amount :</b></label> </td>
								<td><label id='payamount'></label></td>
							</tr>
							<tr>			
								<td><label><b>Pament Mode :</b></label> </td>
								<td><label id='paymode'></label> </td>
							</tr>
							<tr>
								<td><label><b>Currency :</b></label> </td>
								<td><label id='paycurrency'></label> </td>
							</tr> 						  				
							<tr>
								<td><label><b>Date Of Payment :</b></label> </td>
								<td><label id='paydate'></label> </td>
							</tr>
							<tr>
								<td><label><b>Status :</b></label> </td>
								<td><label id='paystatus'></label> </td>
							</tr> 			
							<tr>
								<td> <label><b>Response Code :</b></label> </td>
								<td><label id='payrespcode'></label> </td>
							</tr>
							<tr>
								<td><label><b>Response Message :</b></label> </td>
								<td><label id='payrespmsg'></label> </td>
							</tr>
							<tr>
								<td><label><b>Gateway Name :</b></label> </td>
								<td><label id='paygateway'></label> </td>
							</tr> 
							<tr>
								<td><label><b>Bank Transaction Id :</b></label> </td>
								<td><label id='paybanktranid'></label> </td>
							</tr>  					
							<tr>
								<td><label><b>Bank Name :</b></label>	 </td>
								<td><label id='paybankname'></label> </td>
							</tr>
						</tbody>
					</table>				  
				  <!--	<input type="hidden" name="imagepath" id="imagepath" value="" > -->
              </div>
            </div>
          </div>
        </div>

<div class="col-xl-12">
	<div class="box table-responsive" >
		<div class="form-group">
			<div class="row">
<?php
	$status=$_GET["status"];
	require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if($status=="disp")
	{
		$res=$sql->query("select * from payment");
		echo "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style='width: 100%;'>";
		echo "<tr>
			<th>Id</th>	
			<th>Order id</th>	
			<th>Date</th>	
			<th>Amount</th>	
			<th>Status</th>		
			<th>Address Info</th>		
			<th>Payment Info</th>		
		</tr></thead>";
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>";?> <span id="id<?php echo $row["paymentid"]; ?>"><?php echo $row["paymentid"]; ?></span>  <?php echo "</td>";
			echo "<td>"; ?><div id="orderid<?php echo $row["paymentid"]; ?>"> <?php echo $row["ORDERID"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><div id="date<?php echo $row["paymentid"]; ?>"> <?php echo $row["TXNDATE"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><div id="amount<?php echo $row["paymentid"]; ?>"> <?php echo $row["TXNAMOUNT"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><span id="msg<?php echo $row["paymentid"]; ?>" ><div id="msg-<?php echo $row["paymentid"]; ?>" onClick="AdminOrderStatus(<?php echo $row["paymentid"].",'msg'";?>);" > <?php echo $row["orderstatus"]; ?> </div></span> <?php  echo "</td>";
			echo "<td>"; ?><div id="address<?php echo $row["paymentid"]; ?>"><input type="button" class="btn btn-primary" onClick="ordaddress('<?php echo $row["ORDERID"]; ?>');" id="address" data-toggle='modal' data-target='#Order_Address' value="Address"> </div> <?php  echo "</td>";
			echo "<td>"; ?><div id="payment<?php echo $row["paymentid"]; ?>"><input type="button" class="btn btn-primary" onClick="ordpayment('<?php echo $row["ORDERID"]; ?>');"  data-toggle='modal' data-target='#Order_Payment' value="Payment"> </div> <?php  echo "</td>";
		}
		echo "</tr>";
		echo "</table>";
	}

	if(isset($_POST["x"]))
	{
		$fetch=json_decode($_POST["x"], true);
		if($fetch['status']=="update")
		{
			$sql->query("UPDATE `payment` SET `orderstatus` = '$fetch[data]' WHERE `payment`.`paymentid`=$fetch[id]");
		}
	} 
?>
			</div>
		</div>	
	</div>
</div>
