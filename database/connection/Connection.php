<?php
class Connection {
    private static $instance;
    private $connection;
    private const DB_HOST = 'db';
    private const DB_PORT = '3306';
    private const DB_NAME = 'motorsportpage_db';
    private const DB_PASSWORD = '45037195';
    private const DB_USER = 'root';
    private const OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    public static function getInstance(): Connection {
        if (!isset(self::$instance)) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function connect(): Void {
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', self::DB_HOST, self::DB_PORT, self::DB_NAME);

        try {
            $this->connection = new PDO($dsn, self::DB_USER, self::DB_PASSWORD, self::OPTIONS);
        } catch(PDOException $e) {
            throw new Error('Error de conexión: ' . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}