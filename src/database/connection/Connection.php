<?php
class Connection {
    private const DEFAULT_DB_HOST = 'db';
    private const DEFAULT_DB_PORT = '3306';
    private const DEFAULT_DB_NAME = 'motorsportpage_db';
    private const DEFAULT_DB_PASSWORD = '45037195';
    private const DEFAULT_DB_USER = 'root';
    private const DEFAULT_OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    public static function connect(): PDO {
        //Extrae componentes con valores por defecto seguros
        $host = $_ENV['MYSQLHOST'] ?? self::DEFAULT_DB_HOST;
        $port = $_ENV['MYSQLPORT'] ?? self::DEFAULT_DB_PORT;
        $user = $_ENV['MYSQLUSER'] ?? self::DEFAULT_DB_USER;
        $pass = $_ENV['MYSQLPASSWORD'] ?? self::DEFAULT_DB_PASSWORD;
        $name = $_ENV['MYSQLDATABASE'] ?? self::DEFAULT_DB_NAME;
        $options = self::DEFAULT_OPTIONS;

        error_log(sprintf(
            "Variables independientes: host=%s, port=%s, user=%s, pass=%s, name=%s",
            $host, $port, $user, $pass, $name
        ));
    
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=utf8',
            $host,
            $port,
            $name
        );
        
    
        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch(PDOException $e) {
            throw new PDOException(sprintf(
                'Error conectando a %s: %s',
                $dsn,
                $e->getMessage()
            ));
        }
    }
}