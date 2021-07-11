<?php
    class Stores
    {
        private $sql;
        public function __construct() 
        {
            require_once("../../database/database.config.php");
            $this->sql = Database::getConnection();
        }

        public function getData()
        {
            $response = $this->sql->query("SELECT * FROM `store`");
            $data = $response->fetch_all(MYSQLI_ASSOC);
            return json_encode($data);
        }

        public function addStore($name, $address, $city, $state, $country, $lat, $lng)
        {
            if($lat=="" && $lng=="" )
            {
                $this->sql->query("INSERT INTO store VALUES ('','$name','$address','$city','$state','$country',NULL,NULL)");
            }
            else
            {
                $this->sql->query("INSERT INTO store VALUES ('','$name','$address','$city','$state','$country','$lat','$lng')");
            }
        }

        public function updateStore($id,$column, $data)
        {
            $this->sql->query("UPDATE `store` SET `$column` = '$data' WHERE `store`.`id`=$id");
        }
        
        public function deleteStore($id)
        {
			$this->sql->query("DELETE FROM `store` where `id`=$id");
        }
        
    }

?>