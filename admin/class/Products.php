<?php
    class Products
    {
        private $sql;
        public function __construct() 
        {
            require_once("../../database/database.config.php");
            $this->sql = Database::getConnection();
        }
        
        public function getStocks($search = "")
        {
            $query = "select product_id, product_name, stock from `product_detail`";
            $query .= " WHERE product_name LIKE '%$search%' OR product_id LIKE '%$search%' AND  `product_status` = 0";
            $response = $this->sql->query($query);

            $data = $response->fetch_all(MYSQLI_ASSOC);
            return json_encode($data);
        }

        public function updateStock($id, $stock)
        {
            $this->sql->query("UPDATE `product_detail` SET `product_detail`.`stock` = '$stock' WHERE `product_detail`.`product_id` = $id");
        }

        public function getProducts()
        {
            $response = $this->sql->query("select * from `product_detail` WHERE `product_status` = 0");
            $data = $response->fetch_all(MYSQLI_ASSOC);
            return json_encode($data);
        }

        public function deleteProduct($id)
        {
			$this->sql->query("UPDATE `product_detail` SET `product_status`=1 WHERE `product_id`=$id");
        }

        public function updateProduct($id,$name,$color,$type,$price,$pieceinbox,$thickness,$weight,$usage,$size,$stock)
        {
			$res=$this->sql->query("UPDATE `product_detail` SET `product_name`='$name',`color`='$color',`type`='$type',`usage`='$usage',`stock`=$stock,`price`=$price,`pieceinbox`=$pieceinbox,`weight`=$weight,`thickness`='$thickness',`size`='$size' WHERE `product_detail`.`product_id`=$id");
        }

        public function addProduct($name,$color,$type,$price,$pieceinbox,$thickness,$weight,$usage,$size,$stock,$File)
        {
            $insertValuesSQL="";
            $count=0;
            try
            {
                
                $this->sql->query("INSERT INTO `product_detail`( `product_name`, `color`, `type`, `usage`, `stock`, `price`, `pieceinbox`, `weight`, `thickness`, `size`, `productimg`) VALUES('$name','$color','$type','$usage',$stock,$price,$pieceinbox,$weight,'$thickness','$size','1')");
                $productId = $this->sql->insert_id;

                foreach($File['files']['name'] as $key=>$val)
                {
                    $v1 = rand(1111,9999);
                    $v2 = rand(1111,9999);
                    $v3 = $v1 . $v2;
                    $v3 = md5($v3); 
                    $fnm=$File['files']['name'][$key];

                    $des="../../img/tiles/".$v3.$fnm;
                    $des1="img/tiles/".$v3.$fnm;
        
                    if(move_uploaded_file($File["files"]["tmp_name"][$key], $des))
                    {
                        $count++;
                        $insertValuesSQL .= "('','".$productId."','".$des1."'),";
                    }
                }

                if(!empty($insertValuesSQL))
                {
                    $l=strlen($insertValuesSQL);
                    $insertValuesSQL = substr($insertValuesSQL,0,$l-1);

                    $this->sql->query("INSERT INTO product_photo VALUES $insertValuesSQL");
                }
           
            }
            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
        }

        function getProductImage($id)
        {
            $response = $this->sql->query("SELECT * FROM `product_photo` WHERE `product_id`='$id'");
		    return json_encode($response->fetch_all());
        }

        function updateProductImage($id,$path,$file)
        {
          
            $v1 = rand(1111,9999);
            $v2 = rand(1111,9999);

            $v3 = $v1 . $v2;
            $v3 = md5($v3); 
            $fnm=$file["uploadimage"]["name"];
            $a='../../img/tiles/'.$v3.$fnm;
            $des='img/tiles/'.$v3.$fnm;
            if(move_uploaded_file($file["uploadimage"]["tmp_name"],$a))
            {
                $this->sql->query("UPDATE `product_photo` SET `image`='$des' WHERE `id`='$id' AND `image`='$path'");
                unlink('../../'.$path);
            }
        }

        function deleteProductImage($id)
        {
            $path = $this->sql->query("SELECT `image` FROM `product_photo` WHERE `product_photo`.`id` = $id")->fetch_assoc()['image'];
            if($this->sql->query("DELETE FROM `product_photo` WHERE `product_photo`.`id` = $id"))
            {
                unlink('../../'.$path);
            }
        }

        function addProductImage($id,$file)
        {
            $v1 = rand(1111,9999);
            $v2 = rand(1111,9999);

            $v3 = $v1 . $v2;
            $v3 = md5($v3); 
            $fnm=$file["addphoto"]["name"];
            $a='../../img/tiles/'.$v3.$fnm;
            $des='img/tiles/'.$v3.$fnm;
            if(move_uploaded_file($file["addphoto"]["tmp_name"],$a))
            {
                $this->sql->query("INSERT INTO `product_photo` VALUES ('','$id','$des')");
            }

        }

    }



 ?>
