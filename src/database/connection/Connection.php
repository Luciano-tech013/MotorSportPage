<?php
class Connection {
    private const DEFAULT_OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    public static function connect(): PDO {
        //Extrae componentes con valores por defecto seguros
        $host = getenv('MYSQLHOST');
        $port = getenv('MYSQLPORT');
        $user = getenv('MYSQLUSER');
        $pass = getenv('MYSQLPASSWORD');
        $name = getenv('MYSQLDATABASE');
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