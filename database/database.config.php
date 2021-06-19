<?php

// class db
// {

//     public static $config = array();
//     public static $sql;

//     private static $db;
//     private $connection;

//     public function __construct() {
//         // database
//         db::$config['host'] = 'localhost';
//         db::$config['user'] = 'root';
//         db::$config['pass'] = '';
//         db::$config['db'] = 'premierdb';
//         // connect
//         $this->connection = new mysqli(db::$config['host'], db::$config['user'], db::$config['pass'], db::$config['db']);
//     }
//     function __destruct() {
//         $this->connection->close();
//     }
//     public static function getConnection() {
//         if($db == null){
//             $db = new db();
//         }
//         return $db->connection;
//     }
// }

class Database {

    public static $db;
    private $connection;

    public function __construct() {
        $this->connection = new MySQLi("localhost","root","","premierdb");
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