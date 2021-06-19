
<?php 
$orderid=$_GET['orderid'];
require_once 'dompdf/autoload.inc.php';
require_once("database/database.config.php");
$db = new Database();
$sql = Database::getConnection();

use Dompdf\Dompdf;


$document=new Dompdf();
$qry="SELECT * FROM `address` WHERE orderid='$orderid'";
$res=$sql->query($qry);
$address=mysqli_fetch_assoc($res);
$qry="SELECT * FROM `payment` WHERE orderid='$orderid'";
$res=$sql->query($qry);
$payment=mysqli_fetch_assoc($res);

$html='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel=”icon” href=”favicon.ico” />
	<style>@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 19cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 0px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 95%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #0087C3;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #0087C3;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #0087C3;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #0087C3;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 85%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 5px 0;
  text-align: center;
}

</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="favicon.png">
      </div>
      <div id="" style="padding-left:400px;">
        <h2 class="name">Premier Ceramic PVT LTD</h2>
        <div>Jamnagar</div>
        <div>GST : 24ABCDE1234A1B1</div>
        <div>+91-9227519999</div>
        <div style="padding-left:65px;"><a href="mailto:premierceramic@gmail.com">premierceramic@gmail.com</a></div>
      </div>
      
    </header>
    <main>
      <div id="details" class="">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">'. strtoupper($address['fristname'])."  ".strtoupper($address['lastname']) .'</h2>
          <div class="address">'.$address['houseno'].", ".$address['street'].'</div>
          <div class="">'.$address['city'].", ".$address['state'].", ".$address['zipcode']. '</div>
          <div class="email"><a href="mailto:'.$address['email'].'">'.$address['email'].'</a></div>
        </div>
        <div id="" style="padding-left:350px;">
          <h1 style="color: #0087C3";>INVOICE </h1>
		  <p class="date"  > '.$address['orderid'].' </p>
          <div style="padding-left:185px;" class="date">Date : '.substr($payment['TXNDATE'],0,10).'</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no" >#</th>
            <th class="desc" >DESCRIPTION</th>
            <th class="unit" >UNIT PRICE</th>
            <th class="qty" >QUANTITY</th>
            <th class="total" >TOTAL</th>
          </tr>
        </thead>
		';
		$res=$sql->query("SELECT * FROM `orderproduct` WHERE orderid='$orderid'");
		$count=0;$ship=0;$count=0;$delivery=0;$total=0;
		while($product=mysqli_fetch_assoc($res)){
			$row=mysqli_fetch_assoc($sql->query("SELECT * FROM product_detail WHERE `product_id`=$product[product_id] "));
			$count+=1;
			
        $html=$html.'<tbody>
          <tr>
            <td class="no" >'.$count.'</td>
            <td class="desc"><h3>'.$row['product_name'].' ('.$row['type'].')</td>
            <td class="unit"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'.$row['price'].'</td>
            <td class="qty">'.$product['quantity'].'</td>
            <td class="total"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'.$product['quantity']*$row['price'].'</td>
          </tr>';
			$total = $total + ($product['quantity']*$row['price']);
			$tax = $total*18.00/100;
			$delivery=$delivery+($product['quantity']*15);
			$finalvalue = $total+$tax+$delivery;
			$ship = $ship + ($product['quantity']*15);
			}
		
          $html=$html.'
          
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'. $total.'</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">CGST 9%</td>
            <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'. $tax/2 .'</td>
          </tr>
		  <tr>
            <td colspan="2"></td>
            <td colspan="2">SGST 9%</td>
            <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'. $tax/2 .'</td>
          </tr>
		  <tr>
            <td colspan="2"></td>
            <td colspan="2">Delivery Charge</td>
            <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'. $ship .'</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'. $finalvalue .'</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Suject To Jamnagar jurisdiction</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>';


$document->loadHtml($html);


$document->SetPaper('A4','portrait');


$document->render();


$document->stream('Invoice',array('Attachment'=>0));

?>