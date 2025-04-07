<?php

class UsuariosModel {

    private static $instance;
    private $connection;
    
    private function __construct($connection){
        $this->connection = $connection->getConecction();
    }
    
    public static function getInstance($connection){
        if (!isset(self::$instance)) {
            self::$instance = new UsuariosModel($connection);
        }

        return self::$instance;
    }
    
    public function get($nombre){
        $query = $this->connection->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($username, $userpassword){
        $query = $this->connection->prepare("INSERT INTO usuarios (nombre, password) VALUES (?,?)");
        $query->execute([$username, $userpassword]);
    }
}