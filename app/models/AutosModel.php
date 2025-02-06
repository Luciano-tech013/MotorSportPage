<?php
require_once 'app/models/CategoriasModel.php';

class AutosModel {
    
    private $db;

    public function __construct(){
        $this->db = $this->getDb();
    }

    private function getDB() {
        $db = new PDO('mysql:host=172.17.0.3;port=3306;dbname=motorsportpage_bd;charset=utf8', 'root', '45037195');
        return $db;
    }
    
    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM autos");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    public function getById($id){
        /**Traigo registros mediante el ID para mostrar el form.edit precargado */
        $query = $this->db->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getByDetalle($id){
        /**Traigo registros mediante el ID para mostrar detalle del auto seleccionado*/
        $query = $this->db->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($nombre, $descripcion, $modelo, $marca, $id_categoria){
        $query = $this->db->prepare("INSERT INTO autos (nombres, descripcion, modelo, marca, id_categorias) VALUES (?,?,?,?,?)");
        $query->execute([$nombre, $descripcion, $modelo, $marca, $id_categoria]);
    }

    public function delete($id){
        $query = $this->db->prepare("DELETE FROM autos WHERE id = ?");
        $query->execute([$id]);
    }

    public function update($id, $nombre, $descripcion, $modelo, $marca, $id_categoria){
        $query = $this->db->prepare("UPDATE `autos` SET `nombres` = ?, `descripcion` = ?, `modelo` = ?, `marca` = ?, `id_categorias` = ? WHERE `autos`.`id` = ?");
        $query->execute([$nombre, $descripcion, $modelo, $marca, $id_categoria,$id]);
    }
}