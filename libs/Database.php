<?php

class Database {
    private static $host = 'localhost';
    private static $dbName = 'wp_demo';
    private static $username = 'root';
    private static $password = '';
    public static $con = null;

    public function __construct() {
        echo 'Not connect to db';
    }

    public static function connect() {
        if (self::$con == null) {
            try {
                self::$con = new PDO('mysql:host='.self::$host.';dbname='.self::$dbName, self::$username, self::$password);
            } catch (PDOException $ex) {
                die('Error: '.$ex->getMessage());
            }
        }
        return self::$con;
    }
    
    public static function disconnect() {
        self::$con = null;
    }

}

?>