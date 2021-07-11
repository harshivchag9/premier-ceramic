<?php
    class Orders
    {
        private $sql;
        public function __construct() 
        {
            require_once("../../database/database.config.php");
            $this->sql = Database::getConnection();
        }

        public function getData()
        {
            $response = $this->sql->query("SELECT * FROM `payment`");
            $data = $response->fetch_all(MYSQLI_ASSOC);
            return json_encode($data);
        }

        public function getAddress($id)
        {
            $response = $this->sql->query("SELECT * FROM `address` WHERE `orderid` = '$id'");
            $data = $response->fetch_all(MYSQLI_ASSOC);

            echo json_encode($data);
        }

        public function getPayment($id)
        {
            $response = $this->sql->query("SELECT * FROM `payment` WHERE `orderid` = '$id'");
            $data = $response->fetch_all(MYSQLI_ASSOC);

            echo json_encode($data);
        }

        public function updateOrderStatus($id, $data)
        {
            $this->sql->query("UPDATE `payment` SET `orderstatus` = '$data' WHERE `payment`.`paymentid`=$id");
        }
    }

?>