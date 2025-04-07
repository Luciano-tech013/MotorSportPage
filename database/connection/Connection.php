<?php

class Connection {
    private static $instance;
    private $connection;

    private function __construct() {
        $url = $this->getUrl();
        $this->connection = new PDO($url);
    }

    private function getUrl() {
        $server = getenv("DB_SERVER");
        $host = getenv("DB_HOST");
        $port = getenv("DB_PORT");
        $dbname = getenv("DB_NAME");
        $charset = getenv("DB_CHARSET");

        return "$server:host=$host;port=$port;dbname=$dbname;charset=$charset";
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function getConecction() {
        return $this->connection;
    }
}