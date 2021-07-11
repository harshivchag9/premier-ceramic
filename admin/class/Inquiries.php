<?php
    class Inquiries
    {
        private $sql;
        public function __construct() 
        {
            require_once("../../database/database.config.php");
            $this->sql = Database::getConnection();
        }

        public function getData()
        {
            $response = $this->sql->query("SELECT * FROM `contact` ORDER BY `cformid` DESC");
            $data = $response->fetch_all(MYSQLI_ASSOC);
            return json_encode($data);
        }

        public function checkInquiry($id, $remark)
        {
            $remark=trim($remark);
            if(!$this->sql->query("update contact set remark='$remark',status=1 where cformid=$id"))
            {
                http_response_code(403);
            }
        }

        

    }

  
  

?>