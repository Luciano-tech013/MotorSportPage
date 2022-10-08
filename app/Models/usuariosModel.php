<?php

class usuariosModel {

    function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=motorsport_bd;charset=utf8', 'root', '');
        return $db;
    }

    function getUser($nombre){
        $db = $this->getDb();

        $query = $db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addUser($username, $userpassword){
        $db = $this->getDb();

        $query = $db->prepare("INSERT INTO usuarios (nombre, password) VALUES (?,?)");
        $query->execute([$username, $userpassword]);
    }
}