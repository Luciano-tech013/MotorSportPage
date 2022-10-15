<?php
require_once 'app/Models/categoriasModel.php';

class autosModel {
    
    function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=motorsport_bd;charset=utf8', 'root', '');
        return $db;
    }

    function getAllAutos(){
        $db = $this->getDb();
        
        $query = $db->prepare("SELECT * FROM autos");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    public function getAllAutosForEdit($id){
        $db = $this->getDb();

        $query = $db->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAllAutosDetalle($id){
        $db = $this->getDb();

        $query = $db->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addAuto($nombre, $descripcion, $modelo, $marca, $id_categoria){
        /**$this->helper->checkLogged();*/
        $db = $this->getDb();

        $query = $db->prepare("INSERT INTO autos (nombre, descripcion, modelo, marca, id_categorias) VALUES (?,?,?,?,?)");
        $query->execute([$nombre, $descripcion, $modelo, $marca, $id_categoria]);

    }

    function deleteAuto($id){
        /**$this->helper->checkLogged();*/
        $db = $this->getDb();

        $query = $db->prepare("DELETE FROM autos WHERE id = ?");
        $query->execute([$id]);

    }

    function updateAuto($id, $nombre, $descripcion, $modelo, $marca, $id_categoria){
        /**$this->helper->checkLogged();*/
        $db = $this->getDb();

        $query = $db->prepare("UPDATE `autos` SET `nombre` = ?, `descripcion` = ?, `modelo` = ?, `marca` = ?, `id_categorias` = ? WHERE `autos`.`id` = ?");
        $query->execute([$nombre, $descripcion, $modelo, $marca, $id_categoria,$id]);
    }
}