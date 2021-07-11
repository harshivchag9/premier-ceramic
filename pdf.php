
<?php
   

    $orderid=$_GET['orderid'];
    require_once("database/database.config.php");
    $sql = Database::getConnection();


    $qry="SELECT * FROM `address` WHERE orderid='$orderid'";
    $response=$sql->query($qry);
    $address=$response->fetch_assoc();
    $qry="SELECT * FROM `payment` WHERE orderid='$orderid'";
    $response=$sql->query($qry);
    $payment=$response->fetch_assoc();
    // print_r($payment);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>invoice </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="all,follow">
    <link rel="shortcut icon" href="http://localhost/project/img/premeir-logo.jpg">
  </head>
  <body style="width: 19cm;  margin: 0 auto; position: relative;font-family: SourceSansPro;  font-family: Arial, sans-serif; height: 29.7cm;">

	<div class="col-md-12" style=" padding: 10px 0;  margin-bottom: 20px; border-bottom: 1px solid #AAAAAA;">




	

			<table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
			<tr border="0" width="35%" style=" vertical-align: bottom;">
				<td>
                <img style="height:110px;" align="center" src="http://localhost/project/img/premeir-logo.jpg">
				</td>
			<td border="0" style=" text-align: center; vertical-align: top;" width="25%">
				<div class=" text-center" >
					
				</div>
			</td>
			<td border="0"width="40%" >
				<div class=" " align="right" >
				<h2 style="font-size: 1.4em; color: #000000;   margin: 0;">Premier Ceramic</h2>
				<div>Town Hall Road Near Apsra Cinema</div>
				<div>Jamnagar - 361001</div>
				<div>9099344444 | 9879775330</div>
				<div><a href="mailto:premierceramicguj@gmail.com">premierceramicguj@gmail.com</a></div>
			</div>
			</td>
			</tr>
		</table>
    </div>

    <main>
	<table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
			<tr border="0" width="70%" style=" vertical-align: top;">
				<td>
					<div style="color: #777777;">TO:</div>
					<h2 style="  margin: 0; 	 font-size: 1.4em;"><?=strtoupper(isset($address['fristname'])?$address['fristname']:'')."  ".strtoupper((isset($address['lastname'])?$address['lastname']:''))?></h2>
					<div><?=(isset($address['houseno'])?$address['houseno'].", ":'')?><?=(isset($address['street'])?$address['street']:'')?></div>
					<div><?=(isset($address['city'])?$address['city'].", ":'')?> <?=isset($address['state'])?$address['state']:''?><?=(isset($address['zipcode'])?", ".$address['zipcode']:'')?></div>
					<div><?=isset($address['email'])?$address['email']:''?></div>
				</td>

			<td border="0"width="30%" style=" vertical-align: top;">
				<div align="right" >Date :   <?=substr(isset($payment['TXNDATE'])?$payment['TXNDATE']:'',0,10)  ?></div>
          		<div align="right">Order Id : <?=(isset($address['orderid'])?$address['orderid']:'')?> </div>
			</div>
			</td>
			</tr>
		</table>

        <div id="" class=" text-center" align="center"><br>
          <!-- <h1 style="color: #000000;font-size: 2em;line-height: 1em; font-weight: normal; margin: 0  0 10px 0;">ESTIMATE </h1> -->
        </div>
	  <br>
      <table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
        <thead>
          <tr border="2">
            <th style=" text-align: center; border: 2px solid #A9A9A9; ">#</th>
            <th style=" text-align: center; border: 2px solid #A9A9A9; font-size:0.9em;"class="text-left"  >Product Name</th>
            <th style=" text-align: center; border: 2px solid #A9A9A9; font-size:0.9em;"class="text-left" >Price</th>
            <th style=" text-align: center; border: 2px solid #A9A9A9; font-size:0.9em;"class="text-left" >Quantity</th>
            <th style=" text-align: center; border: 2px solid #A9A9A9; font-size:0.9em; " >Total</th>
          </tr>
        </thead>
        <tbody border="2">
		<?php
				$res=$sql->query("SELECT * FROM `orderproduct` WHERE orderid='$orderid'");
                $count=0;$ship=0;$count=0;$delivery=0;$total=0;
                while($product=$res->fetch_assoc()){
                    $row=$sql->query("SELECT * FROM product_detail WHERE `product_id`=$product[product_id] ")->fetch_assoc();
                    $count+=1;
		?>
          <tr border="2">
            <td style=" text-align: center;border: 2px solid #A9A9A9;  font-size: 0.9em;  "><?=$count?></td>
            <td style=" text-align: center;border: 2px solid #A9A9A9;  font-size: 0.9em;"class="text-left" ><?=$row['product_name']." (".$row['type'].")" ?></td>
            <td style=" text-align: left;border: 2px solid #A9A9A9;  font-size: 0.9em;"class="text-left" ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?=$row['price']?></td>
            <td style=" text-align: left;border: 2px solid #A9A9A9;  font-size: 0.9em;"class="text-left" ><?=$product['quantity']?></td>
            <td style=" text-align: center;border: 2px solid #A9A9A9;  font-size: 0.9em;"class="text-left" ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?=$product['quantity']*$row['price']?></td>
          </tr>
           <?php
					$total = $total + ($product['quantity']*$row['price']);
                    $tax = $total*18.00/100;
                    $delivery=$delivery+($product['quantity']*15);
                    $finalvalue = $total+$tax+$delivery;
                    $ship = $ship + ($product['quantity']*15);
				}
                $colspan =2;
		  ?>


        </tbody>
        <tfoot border="0">
          <tr>
            <td style="   font-size: 0.9em; border:solid 1px #FFF; solid #AAAAAA; " colspan="<?=$colspan?>"></td>
            <td style="   font-size: 0.9em; solid #AAAAAA; " colspan="2">SUBTOTAL</td>
            <td style="   font-size: 0.9em; solid #AAAAAA; text-align: right" style="padding: 10px 20px; border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA; "><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?=$total?></td>
          </tr>
		 
		
			  <tr>
				<td style="   border:solid 1px #FFF;font-size: 1em; "  colspan="<?=$colspan?>"></td>
				<td style="   font-size: 0.9em; "  colspan="2">CGST 9%</td>
				<td style="   font-size: 0.9em; text-align: right;" ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?=$tax/2?></td>
			  </tr>
			  <tr>
				<td style="   border:solid 1px #FFF;font-size: 0.9em; "  colspan="<?=$colspan?>"></td>
				<td style="   font-size: 0.9em; "  colspan="2">SGST 9%</td>
				<td style="    text-align: right; border-bottom: none;font-size: 0.9em; " ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?=$tax/2?></td>
			  </tr>
		
          <tr >
            <td style="   border:solid 1px #FFF;font-size: 0.9em; " colspan="<?=$colspan?>"></td>
            <td style="   font-size: 0.9em; color: #000000;border-top: 1px solid #A9A9A9;  " colspan="2">DELIVERY</td>
            <td style="   border-bottom: none;font-size: 0.9em;  color: #000000;border-top: 1px solid #A9A9A9; text-align:right;" ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?=$ship?></td>
          </tr>

		  <tr >
            <td style="   border:solid 1px #FFF;font-size: 0.9em; " colspan="<?=$colspan?>"></td>
            <td style="   font-size: 0.9em; color: #000;border-top: 1px solid #A9A9A9;  " colspan="2">GRAND TOTAL</td>
            <td style="   border-bottom: none;font-size: 0.9em;  color: #000;border-top: 1px solid #A9A9A9; text-align:right;" ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?=$finalvalue?></td>
          </tr>
		  

        </tfoot>
      </table>
	  <br><br><br>
      <div >Thank you.</div>
      <div style="padding-left: 6px;  ">
        <div>NOTICE:</div>
        <div >Subject to Jamnagar Jurisdiction</div>
      </div>
    </main>
	
    <footer style="color: #777777;width: 100%;height: 30px;position: absolute;bottom: 0;border-top: 1px solid #AAAAAA;text-align: center;">
      This was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>