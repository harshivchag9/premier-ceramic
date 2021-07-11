<?php
    
    class products
    {

        public $query;
        private $sql;
        public function __construct() 
        {
            require_once("../database/database.config.php");
            $this->sql = Database::getConnection();
        }

        public function getAllProducts($min="",$max="",$color="",$type="",$thickness="",$size="")
        {
            $this->query = "SELECT * FROM product_detail where product_status = '0'";
            if(!empty($min)||!empty($max))
            {
                $this->query .= "
                AND price BETWEEN $min AND $max
                ";
            }
            if(!empty($color))
            {
                $colordata =implode(',',(array)$color);
                $this->query .= "
                AND color IN('$colordata')
                ";
            }
            if(!empty($type))
            {
                $typedata = implode("','",(array)$type);
                $this->query .= "
                AND type IN('$type')
                ";
            }
            if(!empty($thickness))
            {
                $thicknessdata = implode("','",(array)$thickness);
                $this->query .= "
                AND thickness IN('$thickness')
                ";
            }
            if(!empty($size))
            {
                $sizedata = implode("','",(array)$size);
                $this->query .= "
                AND size IN('$sizedata')
                ";
            }
            // $response = $this->sql->query($this->query)->fetch_all(MYSQLI_ASSOC);
            $data=array();
            $response = $this->sql->query($this->query);
            while( $row = $response->fetch_assoc())
            {
                $imageResponse = $this->sql->query("select * from product_photo WHERE product_id='$row[product_id]'");
                if($imageResponse->num_rows>0){
                    $imageArray = $imageResponse->fetch_all(MYSQLI_NUM);
                    $row['productimg'] = $imageArray;
                }
                else{
                    $row['productimg'] = array(array(0,0,"img/No_image_available.png"));
                }
               
                if(isset($_SESSION['loggeduserid'])){
                    $cartResponse= $this->sql->query("SELECT Product_id FROM cart WHERE Product_id='$row[product_id]' AND User_id='$_SESSION[loggeduserid]' LIMIT 1");
                    $row['cart'] = ($cartResponse->num_rows<1)?true:false;
                }
                array_push($data,$row);
            }
			// $image=	isset($row1['image'])?$row1['image'] :"";
            return json_encode($data);
        }

        public function addToWishlist($id,$user)
        {
            $response = $this->sql->query("SELECT * FROM product_detail WHERE product_id ='$id' LIMIT 1");
	    	if($response->num_rows > 0)
            {
                $row = $response->fetch_assoc();
                $productId= "$row[product_id]";
                $this->sql->query("INSERT INTO wishlist(User_id,Product_id) VALUES ($user,$productId)");
            }
        }
        public function removeFromWishlist($id,$user)
        {
            $response = $this->sql->query("DELETE FROM wishlist WHERE Product_id ='$id' AND User_id='$user' LIMIT 1");
	    	if(!$this->sql->query("DELETE FROM wishlist WHERE Product_id ='$id' AND User_id='$user'"))
            {
               echo "something went wrong";
               exit();
            }
        }

        public function addToCart($id,$user)
        {
            $response = $this->sql->query("SELECT * FROM product_detail WHERE product_id ='$id' LIMIT 1");
            if($response->num_rows > 0)
            {
                $row = $response->fetch_assoc();
                $id= "$row[product_id]";
                // $user=$_SESSION['loggeduserid'];
	            $date = date('y/m/d', time());
                
                $cartResponse= $this->sql->query("SELECT * FROM cart WHERE Product_id='$id' AND User_id='$user'");
                if ( $cartResponse->num_rows < 1 ) 
                {
                    if($this->sql->query("INSERT INTO cart(User_id,Product_id,quantity,date) VALUES ($user,$id,1,'$date')")){
                        return '{"responseNumber":200,"responseBool":true,"responseMessage":"Product added in cart"}';
                    }
                    else
                    {
                        return '{"responseNumber":404,"responseBool":false,"responseMessage":"Something went wrong"}';
                    }
                }else
                {
                    return '{"responseNumber":505,"responseBool":false,"responseMessage":"already Item in the cart"}';
                }
		    }
        }
        public function cartUpdate($id,$quantity)
        {
            if($this->sql->query("UPDATE `cart` SET `quantity` = '$quantity' WHERE `cart`.`cart_id` = $id"))
            {
                return '{"responseNumber":200,"responseBool":true,"responseMessage":""}';
            }
            else
            {
                return '{"responseNumber":404,"responseBool":false,"responseMessage":"Something went wrong"}';
            }
        }

        public function deleteFromCart($id)
        {
            $this->sql->query("DELETE FROM `cart` WHERE `cart_id` ='$id'");
        }

    }
    
?>