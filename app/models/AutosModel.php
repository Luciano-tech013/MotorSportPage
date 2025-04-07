<?php
class AutosModel {
    
    private static $instance;
    private $connection;

    private function __construct($connection){
        $this->connection = $connection->getConnection();
    }

    public static function getInstance($connection) {
        if(!isset(self::$instance)) {
            self::$instance = new AutosModel($connection);
        }

        return self::$instance;
    }

    public function getAll(){
        $query = $this->connection->prepare("SELECT * FROM autos");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    public function getById($id){
        /**Traigo registros mediante el ID para mostrar el form.edit precargado */
        $query = $this->connection->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getByDetalle($id){
        /**Traigo registros mediante el ID para mostrar detalle del auto seleccionado*/
        $query = $this->connection->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($nombre, $descripcion, $modelo, $marca, $id_categoria){
        $query = $this->connection->prepare("INSERT INTO autos (nombres, descripcion, modelo, marca, id_categorias) VALUES (?,?,?,?,?)");
        $query->execute([$nombre, $descripcion, $modelo, $marca, $id_categoria]);
    }

    public function delete($id){
        $query = $this->connection->prepare("DELETE FROM autos WHERE id = ?");
        $query->execute([$id]);
    }

    public function update($id, $nombre, $descripcion, $modelo, $marca, $id_categoria){
        $query = $this->connection->prepare("UPDATE `autos` SET `nombres` = ?, `descripcion` = ?, `modelo` = ?, `marca` = ?, `id_categorias` = ? WHERE `autos`.`id` = ?");
        $query->execute([$nombre, $descripcion, $modelo, $marca, $id_categoria,$id]);
    }
}