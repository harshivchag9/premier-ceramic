<?php 
	session_start();
  if(!isset($_SESSION['loggeduserid']))
  {
    header("location: register.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Premier Ceramic</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
<script type="text/javascript">
	  
  function remove(id)
  {
    $.post('api/removecartitem.php' , { id : id} , function(data){
        $("#alltotal").html( Number($("#alltotal").html())-Number($("#total-"+id).html()));
        $('#product-'+id).remove(); 
        location.reload();
      });
  }
  function UpdateProductTotal(cartid)
  {		
    var price = Number($("#price-"+cartid).val());					  
    var quantity = Number($("#quantity-"+cartid).val());
    $('#total-'+cartid).html(price*quantity)
    
    UpdateCart();
    CartDbUpdate(cartid,quantity);
  }
  function UpdateCart()
  {	
    var t=0,i=0,v=0;
    var tc = $("#tcount").val();
    var ShippingCost = 0;
    for(i=1;i<=tc;i++)
    {
      var v = document.getElementById("price-"+i).innerHTML; 
      var q1 = document.getElementsByName('quantity1-'+i)[0].value;	  
      t = Number(t) + (Number(v)*Number(q1));  
      ShippingCost += Number(q1) * 15;
    }
    document.getElementById("alltotal").innerHTML =Number(t);  
    document.getElementById("subtotal").innerHTML =Number(t);
    var tax = Number(t)*18.00/100;
    var ft = Number(t)+Number(tax)+Number(ShippingCost);
    document.getElementById("tax").innerHTML =Number(tax);
    document.getElementById("finalvalue").innerHTML =parseFloat(ft).toFixed( 2 );
    document.getElementById("shipping").innerHTML =Number(ShippingCost);
  }
  function CartDbUpdate(cart_id,quantity)
  {
    $.post('api/update-cart-value.php' , { cart_id : cart_id, quantity:quantity} , function(data){
      var obj = jQuery.parseJSON(data);
      if(obj.responseBool=false){
        alert("Something Went Wrong Please Try After Sometime");
      }
    });
  }
 
</script>
  </head>
  <body>
	<?php require('header.php')?>
    
    
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            
            <div id="basket" class="col-lg-9">
              <div class="box">
                <form method="post" action="api/create-checkout.php">
                  <h1>Shopping cart</h1>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Product</th>
                          <th>Quantity</th>
                          <th>Unit price</th>
                          <th>Discount</th>
                          <th colspan="2">Total</th>
                        </tr>
                      </thead>
                      <tbody>
						
						   
				  <?php
              require_once("database/database.config.php");
              $sql = Database::getConnection();
						  if(isset($_SESSION['loggeduserid']))
            	{
						    $res=$sql->query("select * from cart WHERE User_id = $_SESSION[loggeduserid]");
						    $row = "";
                $notAvailableCount=0;
						    $ship=0;$count=0;$delivery=0;$total=0;
						    while($row = $res->fetch_array())
						    {
						      $count++;		
						      $row1=$sql->query("select * from product_detail WHERE product_id = $row[Product_id]")->fetch_array();
                  if($row1['product_status']==1)
                  {
                    $sql->query("DELETE FROM `cart` WHERE `Product_id` = $row1[product_id] AND `User_id` = $_SESSION[loggeduserid] ");
                    $notAvailableCount++;
                    continue;
                  }
					?>
						  		 
                  <tr id="product-<?=$row['cart_id']; ?>">
                    <td><a href="detail.php?id=<?=$row1['product_id']; ?>"><?=$row1['product_name'];?></a></td>
                    <td>
                      <input name="id-<?=$count; ?>" type="hidden" value="<?=$row['Product_id']; ?>" >
                      <input name="quantity1-<?=$count; ?>" id="quantity-<?=$row['cart_id']?>" onChange="UpdateProductTotal(<?=$row['cart_id']?>)" type="number" value="<?=$row['quantity']?>" class="form-control" min="1" max="9999" style="width: 75px !important;">
                    </td>
                    <td>&#8377;<span id="price1-<?=$row['cart_id']?>"></span><span id="price-<?=$count?>"><?=$row1['price']?></span></td>
                    <td>0.00</td>
                    <input type="hidden" id="price-<?=$row['cart_id']?>" value="<?=$row1['price']?>" >
                    <td>&#8377;<span id="total-<?=$row['cart_id']?>"><?=$row['quantity']*$row1['price']?></span></td>
                    <td><a id="remove-<?=$row['cart_id']?>" onClick="remove(<?=$row['cart_id']?>)" > <i class="fa fa-trash-o"></i></a></td>
                  </tr>
                       		
<?php 
							
                  $total = $total + ($row['quantity']*$row1['price']);
                  $tax = $total*18.00/100;
                  $delivery=$delivery+($row['quantity']*15);
                  $finalvalue = $total+$tax+$delivery;
                  $ship = $ship + ($row['quantity']*15);
                }   
              }
              if($notAvailableCount>0)
              {
                echo "<script>alert('".$notAvailableCount." product not available are removed from cart')</script>";
              }
?> 
						  	<input type="hidden" name="tcount" id="tcount" value="<?=$count;?>" >  
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="5">Total</th>
                  <th name="alltotal"  colspan="2">&#8377;<span id="alltotal" ><?= isset($total)?$total:""?></span>  </th>
                </tr>
              </tfoot>
            </table>
          </div>
						  <!--<input type="hidden" name="subprice" value="<?php// if(isset($count)){echo $count; }?>">-->
          <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
            <div class="left"><a href="category.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
            <div class="right">
              <button type="submit" onClick="CheckOutOrder();" name="checkout" value="checkout" class="btn btn-primary">Proceed to Order<i class="fa fa-chevron-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-lg-3">
      <div id="order-summary" class="box" style="width:300px" >
        <div class="box-header">
          <h3 class="mb-0">Order summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
        <div  class="table-responsive">
          <table id="summery" class="table">
            <tbody>
              <tr>
                <td>Order subtotal</td>
                <th>&#8377;<span id="subtotal"><?=isset($total)?$total:""?></span></th>
              </tr>
              <tr>
                <td>Shipping and handling</td>
                <th>&#8377;<span id="shipping"><?=isset($ship)?$ship:""?></span></th>
              </tr>
              <tr>
                <td>Tax</td>
                <th>&#8377;<span id="tax"><?=isset($tax)?$tax:""?></span></th>
              </tr>
              <tr class="total">
                <td>Total</td>
                <th>&#8377;<span id="finalvalue"><?=isset($finalvalue)?$finalvalue:""?></span></th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
          </div>
        </div>
      </div>
    </div>
    
	    <?php require('footer.php')?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/front.js"></script>
  </body>
</html>