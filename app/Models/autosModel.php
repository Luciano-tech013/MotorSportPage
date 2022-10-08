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

    function getAllCategoryByAutos(){
        $db = $this->getDb();

        $query = $db->prepare("SELECT a.id_categorias, c.nombre, c.id_categorias FROM autos a INNER JOIN categorias c ON c.id_categorias = a.id_categorias");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAllAutosDetalle($id){
        $db = $this->getDb();

        $query = $db->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addAuto($nombre, $descripcion, $modelo, $marca, $imagen,$id_categoria){
        $db = $this->getDb();

        $query = $db->prepare("INSERT INTO autos (nombre, descripcion, modelo, marca, imagenes, id_categoria VALUES (?,?,?,?,?,?)");
        $query->execute([$nombre, $descripcion, $modelo, $marca, $imagen, $id_categoria]);

    }

    function deleteAuto(){
        $db = $this->getDb();

        $query = $db->prepare("DELETE FROM autos WHERE id = ?");
        $query->execute([$id]);

    }

    function updateAuto($id, $nombre, $descripcion, $modelo, $marca, $id_categoria){
        $db = $this->getDb();

        $query = $db->prepare("UPDATE autos SET nombre = $nombre, descripcion = $descripcion, modelo = $modelo, marca = $marca, id_categoria = $id_categoria WHERE id = ?");
        $query->execute([$id, $nombre, $descripcion, $modelo, $marca, $id_categoria]);
    }
}