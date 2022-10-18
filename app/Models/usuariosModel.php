<?php

class usuariosModel {

    private $db;
    
    function __construct(){
        $this->db = $this->getDb();
    }
    private function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=motorsport_bd;charset=utf8', 'root', '');
        return $db;
    }

    //PONER PARAMETRO NOMBRE DSP ATTE: FONZO
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