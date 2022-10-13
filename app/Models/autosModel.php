<?php
require_once 'app/helpers/AuthHelper.php';
require_once 'app/Models/categoriasModel.php';

class autosModel {

    private $helper;

    function __construct(){
        $this->helper = new AuthHelper();
    }

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

        $query = $db->prepare("SELECT c.nombre, a.id_categorias FROM categorias c INNER JOIN autos a ON c.id_categorias = a.id_categorias");
        $query->execute();

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

        $query = $db->prepare("UPDATE autos SET nombre = ?, descripcion = ?, modelo = ?, marca = ?, id_categorias = ? WHERE id = ?");
        $query->execute([$id, $nombre, $descripcion, $modelo, $marca, $id_categoria]);
    }
}