<?php
class Connection {
    private static $instance;
    private $connection;
    
    private function __construct() {
        $host = "db";
        $port="3306";
        $dbname="motorsportpage_bd";
        $password = "45037195";
        $user = "root";
        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";
        $this->connection = new PDO($dsn, $user, $password);
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}