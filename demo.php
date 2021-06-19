<?php 
		echo "<div class='col-lg-3 col-md-4'>";
		echo "<div class='product'>";
			echo "<div class='flip-container'>";
				echo "<div class='flipper'>";
					echo "<div class='front'>";
						echo'<a href="detail.php?id=' . $row['product_id'] . '"><img src="' . $row['productimg'] . '" alt="" class="img-fluid"></a>';
					echo '<div>';
					echo "<div class='back'>";
							echo'<a href="detail.php?id=' . $row['product_id'] . '"><img src="' . $row['productimg'] . '" alt="" class="img-fluid"></a>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo'<a href="detail.php?id=' . $row['product_id'] . '"><img src="' . $row['productimg'] . '" alt="" class="img-fluid"></a>';
			echo "<div class='text'>";
               echo '<h3>';
					echo '<a href=" detail.php?id=' . $row['product_id'] . ' ">';echo $row['product_name']; echo '</a>';
			   echo '</h3>';
			echo "<p class='price'>";
                   echo "&#8377".$row['price'];
            echo '</p>';
			echo "<p class='buttons'>";
				echo '<a href=" detail.php?id=' . $row['product_id'] . ' " class="btn btn-outline-secondary">';
				echo 'View detail';  echo '</a>';
				echo "<input type='hidden' id='productid' name='id' value=".$row['product_id'].">";
			  
            if(!isset($_SESSION['loggeduserid']))
            {
            
              echo "<a id='addcart' onClick='notlogged()' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>";   
           }
            else{
					$sql1= mysqli_query($dbcon,"SELECT * FROM cart WHERE Product_id='$row[product_id]' AND User_id='$_SESSION[loggeduserid]' LIMIT 1");
					$numberofrow = mysqli_num_rows( $sql1 );
					if ( $numberofrow < 1 )
					{
						 echo "<a id='addcart-'".$row['product_id']."'". "onClick='click_cart('echo(".$row['product_id'].");".")"."class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>";
					}
					else
					{
						echo "<a id='addcartdisabled' class='btn btn-primary disabled'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
					}
				}  
				echo '</p>'.'</div>'.'</div>'.'</div>'; 
						
                    
                  
                  
?>