<?php
require_once 'app/Models/autosModel.php';

class categoriasModel {

    private $autosModel;

    function __construct(){
        $this->autosModel = new autosModel();
    }

    function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=motorsport_bd;charset=utf8', 'root', '');
        return $db;
    }

    function getAllCategorias(){
        $db = $this->getDb();
        
        $query = $db->prepare("SELECT * FROM categorias");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllCategoriasForEdit($id){
        $db = $this->getDb();

        $query = $db->prepare("SELECT * FROM categorias WHERE id_categorias = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAllNameCategorias($id){
        $db = $this->getDb();

        $query = $db->prepare("SELECT nombre FROM categorias WHERE id_categorias = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAllAutosByCategoryId($id){
        $db = $this->getDb();
        
        $query = $db->prepare("SELECT * FROM autos WHERE id_categorias = $id");
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addCategoria($nombre, $descripcion, $tipo){
        $db = $this->getDb();

        $query = $db->prepare("INSERT INTO categorias (nombre, descripcion, tipo) VALUES(?,?,?)");
        $query->execute([$nombre, $descripcion, $tipo]);
    }

    function deleteCategoria($id){
        $db = $this->getDb();

        $query = $db->prepare("DELETE FROM categorias WHERE id_categorias = ?");
        $query->execute([$id]);
    }

    function updateCategoria($id, $nombre, $descripcion, $tipo){
        $db = $this->getDb();

        $query = $db->prepare("UPDATE `categorias` SET `nombre` = ?, `descripcion` = ?, `tipo` = ? WHERE `categorias`.`id_categorias` = ?");
        $query->execute([$nombre, $descripcion, $tipo, $id]);
    }

}