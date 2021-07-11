<?php

class Database {

    public static $db;
    private $connection;

    public function __construct() {
        $this->connection = new MySQLi("localhost","root","","premierdb");
        // $this->connection = new MySQLi("fdb24.awardspace.net","3271891_web","harshivchag1","3271891_web");
    }

    function __destruct() {
        $this->connection->close();
    }

    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }
}


// $link=mysqli_connect("localhost","root","");
// mysqli_select_db($link,"premierdb");

?>