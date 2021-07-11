<?php
    class Users
    {
        private $sql;
        function __construct()
        {
            require_once("../database/database.config.php");
            $this->sql = Database::getConnection();
        }

        public function registerUser()
        {

        } 

        public function loginUser()
        {

        }

        function checkEmailAvailability($email)
        {
            
        }
    }

?>