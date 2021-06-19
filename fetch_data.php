<style>
   .img-fluid {
    width: 200px; /* You can set the dimensions to whatever you want */
    height: 200px;
    object-fit: cover;
}
   </style>
<?php

	session_start();
	require_once("database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	$query="";

	$min = isset($_GET['minimum_price'])?$_GET['minimum_price']:"";
	$max = isset($_GET['maximum_price'])?$_GET['maximum_price']:"";
	$color = isset($_GET['color'])?$_GET['color']:"";
	$type = isset($_GET['type'])?$_GET['type']:"";
	$thickness = isset($_GET['thickness'])?$_GET['thickness']:"";
	$size = isset($_GET['size'])?$_GET['size']:"";

	if(isset($_GET["action"]))
	{
		$query = "SELECT * FROM product_detail where product_status = '0'";
		if(!empty($min)||!empty($max))
		{
			$query .= "
			 AND price BETWEEN $min AND $max
			";
		}
		if(!empty($color))
		{
			$colordata =implode(',',(array)$color);
			$query .= "
			 AND color IN('$colordata')
			";
		}
		if(!empty($type))
		{
			$typedata = implode("','",(array)$type);
			$query .= "
			 AND type IN('$type')
			";
		}
		if(!empty($thickness))
		{
			$thicknessdata = implode("','",(array)$thickness);
			$query .= "
			 AND thickness IN('$thickness')
			";
		}
		if(!empty($size))
		{
			$sizedata = implode("','",(array)$size);
			$query .= "
			 AND size IN('$sizedata')
			";
		}
		
		//echo "<div class=row>";
		
		$res=$sql->query($query);
		while($row = mysqli_fetch_assoc($res))
		{
			$res1=$sql->query("select * from product_photo WHERE product_id='$row[productimg]' LIMIT 1");
			$row1=mysqli_fetch_array($res1);
			$image=	isset($row1['image'])?$row1['image'] :"";

			echo "<div style='min-width:100px;min-height:120px;' class='col-lg-3 col-md-4'>";
			echo "<div  class='product'>";
			echo "<div class='flip-container'>";
			echo "<div class='flipper'>";
			echo "<div class='front'>";
			echo'<a  href="detail.php?id=' . $row['product_id'] . '"><img src="' . $image . '" alt="" class="img-fluid"></a>';
			echo '</div>';
			echo "<div class='back'>";
			echo'<a href="detail.php?id=' . $row['product_id'] . '"><img src="' . $image . '" alt="" class="img-fluid"></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo'<a href="detail.php?id=' . $row['product_id'] . '"><img src="' . $image . '" alt="" class="img-fluid"></a>';
			echo "<div class='text'>";
			echo '<h3>';
			echo '<a href=" detail.php?id=' . $row['product_id'] . ' ">';echo $row['product_name']; echo '</a>';
			echo '</h3>';
			echo "<p class='price'>";
			echo "&#8377;".$row['price'];
			echo '</p>';
			echo "<p class='buttons'>";
			echo '<a href=" detail.php?id=' . $row['product_id'] . ' " class="btn btn-outline-secondary" onClick="recentviewadd('.$row['product_id'].')" >';
			echo 'View detail';  echo '</a>';
			echo "<input type='hidden' id='productid' name='id' value=".$row['product_id'].">";
		
			if(!isset($_SESSION['loggeduserid']))
			{

			echo "<a id='addcart' onClick='notlogged()' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>";   
			}
			else
			{
				$sql1= $sql->query("SELECT * FROM cart WHERE Product_id='$row[product_id]' AND User_id='$_SESSION[loggeduserid]' LIMIT 1");
				$numberofrow = mysqli_num_rows( $sql1 );
				if ( $numberofrow < 1 )
				{ ?>
					<a id="addcart-<?php echo($row['product_id']);?>" onClick="click_cart(<?php echo($row['product_id']);?>)" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
<?php					}
				else
				{
					echo "<a id='addcartdisabled' class='btn btn-primary disabled'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
				}
			}  
			echo '</p>'.'</div>'.'</div>'.'</div>'; 
		}
	}
?>
