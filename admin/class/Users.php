<?php
    class Users
    {
        private $sql;
        public function __construct() 
        {
            require_once("../../database/database.config.php");
            $this->sql = Database::getConnection();
        }

        public function getData()
        {
            $response = $this->sql->query("SELECT `user_id`, `username`, `email`, `role` FROM `registration`");
            $data = $response->fetch_all(MYSQLI_ASSOC);
            return json_encode($data);
        }

        public function updateUser($id, $username, $email, $role)
        {
            $this->sql->query("UPDATE `registration` SET `username`='$username',`email`='$email',`role`='$role' WHERE `registration`.`user_id`=$id");
        }

        public function deleteUser($id)
        {
			$this->sql->query("DELETE FROM `registration` where `user_id`=$id");
        }
        
    }

?>