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
        //Usa MYSQL_URL Railway para obtener la URL
        $databaseURL = getenv("MYSQL_URL");
        
        //Registra el valor para debug de credenciales
        error_log("Valor de MYSQL_URL: " . $databaseURL);
    
        if($databaseURL) {
            $databaseURL = str_replace('jdbc:', '', $databaseURL);
            $parts = parse_url($databaseURL);
    
            //Extrae componentes con valores por defecto seguros
            $host = $parts['host'] ?? '';
            $port = $parts['port'] ?? '3306';
            $user = $parts['user'] ?? '';
            $pass = $parts['pass'] ?? '';
            $name = ltrim($parts['path'] ?? '', '/');
        } else {
            //Para entorno local (opcional)
            $host = self::DEFAULT_DB_HOST;
            $port = self::DEFAULT_DB_PORT;
            $user = self::DEFAULT_DB_USER;
            $pass = self::DEFAULT_DB_PASSWORD;
            $name = self::DEFAULT_DB_NAME;
        }
    
        $options = self::DEFAULT_OPTIONS;
    
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', $host, $port, $name);
    
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