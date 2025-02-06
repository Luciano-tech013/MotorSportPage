<?php

class UsuariosModel {

    private $db;
    
    function __construct(){
        $this->db = $this->getDb();
    }
    
    private function getDB() {
        $db = new PDO('mysql:host=172.17.0.3;port=3306;dbname=motorsportpage_bd;charset=utf8', 'root', '45037195');
        return $db;
    }
    
    public function get($nombre){
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($username, $userpassword){
        $query = $this->db->prepare("INSERT INTO usuarios (nombre, password) VALUES (?,?)");
        $query->execute([$username, $userpassword]);
    }
}