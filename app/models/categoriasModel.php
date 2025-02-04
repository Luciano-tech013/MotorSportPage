<?php
require_once 'app/models/AutosModel.php';

class categoriasModel {
    
    private $db;
    private $autosModel;

    public function __construct(){
        $this->db = $this->getDb();
        $this->autosModel = new autosModel();
    }

    private function getDB() {
        $db = new PDO('mysql:host=localhost;port=3307;dbname=motorsportpage_bd;charset=utf8', 'root', '');
        return $db;
    }
    
    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id){
        /**Traigo registros mediante el ID para mostrar el form.edit precargado */
        $query = $this->db->prepare("SELECT * FROM categorias WHERE id_categorias = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getByIdWithName($id){
        /**Traigo solo el nombre mediante el ID de la categoria seleccionada */
        $query = $this->db->prepare("SELECT nombre FROM categorias WHERE id_categorias = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryNameWithAllAutos(){
        /**Inner join que me devuelve la categorias a la que pertenecen los autos (items) */
        $query = $this->db->prepare("SELECT a.*, c.nombre FROM autos a INNER JOIN categorias c ON a.id_categorias = c.id_categorias");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllAutosByCategoryId($id){
        /**Traigo los autos mediante el ID para mostrar el filtrado de la categoria seleccionada */
        $query = $this->db->prepare("SELECT * FROM autos WHERE id_categorias = $id");
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($nombre, $descripcion, $tipo){
        $query = $this->db->prepare("INSERT INTO categorias (nombre, descripcion, tipo) VALUES(?,?,?)");
        $query->execute([$nombre, $descripcion, $tipo]);
    }

    public function delete($id){
        try {
            $query = $this->db->prepare("DELETE FROM categorias WHERE id_categorias = ?");
            $query->execute([$id]);
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function update($id, $nombre, $descripcion, $tipo){
        $query = $this->db->prepare("UPDATE `categorias` SET `nombre` = ?, `descripcion` = ?, `tipo` = ? WHERE `categorias`.`id_categorias` = ?");
        $query->execute([$nombre, $descripcion, $tipo, $id]);
    }

}