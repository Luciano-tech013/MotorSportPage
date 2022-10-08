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

    function getAllAutosByCategoryId($id){
        $db = $this->getDb();
        
        $query = $db->prepare("SELECT * FROM autos WHERE id_categorias = $id");
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}