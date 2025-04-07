<?php
class CategoriasModel {
    
    private static $instance;
    private $connection;
   
    private function __construct($connection) {
        $this->connection = $connection->getConnection();
    }

    public static function getInstance($connection) {
        if(!isset(self::$instance)) {
            self::$instance = new CategoriasModel($connection);
        }

        return self::$instance;
    }
    
    public function getAll(){
        $query = $this->connection->prepare("SELECT * FROM categorias LIMIT 5");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllByIdUser($id) {
        $query = $this->connection->prepare("SELECT * FROM categorias WHERE id_usuario = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id){
        /**Traigo registros mediante el ID para mostrar el form.edit precargado */
        $query = $this->connection->prepare("SELECT * FROM categorias WHERE id_categorias = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getByIdWithName($id){
        /**Traigo solo el nombre mediante el ID de la categoria seleccionada */
        $query = $this->connection->prepare("SELECT nombre FROM categorias WHERE id_categorias = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryNameWithAllAutos(){
        /**Inner join que me devuelve la categorias a la que pertenecen los autos (items) */
        $query = $this->connection->prepare("SELECT a.*, c.nombre FROM autos a INNER JOIN categorias c ON a.id_categorias = c.id_categorias LIMIT 6");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryNameWithAllAutosByIdUser($id) {
        $query = $this->connection->prepare("SELECT a.*, c.nombre FROM autos a INNER JOIN categorias c ON a.id_categorias = c.id_categorias WHERE c.id_usuario = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllAutosByCategoryId($id){
        /**Traigo los autos mediante el ID para mostrar el filtrado de la categoria seleccionada */
        $query = $this->connection->prepare("SELECT * FROM autos WHERE id_categorias = $id");
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($nombre, $descripcion, $tipo, $id_usuario){
        $query = $this->connection->prepare("INSERT INTO categorias (nombre, descripcion, tipo, id_usuario) VALUES(?,?,?,?)");
        $query->execute([$nombre, $descripcion, $tipo, $id_usuario]);
    }

    public function delete($id){
        try {
            $query = $this->connection->prepare("DELETE FROM categorias WHERE id_categorias = ?");
            $query->execute([$id]);
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function update($id, $nombre, $descripcion, $tipo){
        $query = $this->connection->prepare("UPDATE `categorias` SET `nombre` = ?, `descripcion` = ?, `tipo` = ? WHERE `categorias`.`id_categorias` = ?");
        $query->execute([$nombre, $descripcion, $tipo, $id]);
    }

}