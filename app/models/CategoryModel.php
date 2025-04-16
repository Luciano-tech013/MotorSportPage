<?php
class CategoryModel {
    
    private static CategoryModel $instance;
    private PDO $connection;
   
    private function __construct(Connection $connection) {
        try {
            $connection->connect();
        } catch(PDOException $e) {
            throw new Error($e);
        }

        $this->connection = $connection->getConnection();
    }

    public static function getInstance(Connection $connection): CategoryModel {
        if(!isset(self::$instance)) {
            self::$instance = new CategoryModel($connection);
        }

        return self::$instance;
    }
    
    public function getAll(): Array {
        $query = $this->connection->prepare("SELECT * FROM category LIMIT 5");
        $query->execute();
        
        return $query->fetchAll();
    }

    public function getAllByIdUser(String $id): Array {
        $query = $this->connection->prepare("SELECT * FROM category WHERE user_id = ?");
        $query->execute([$id]);

        return $query->fetchAll();
    }

    /**Traigo registros mediante el ID para mostrar el form.edit precargado */
    public function getById(String $id): ?Object {
        $query = $this->connection->prepare("SELECT * FROM category WHERE category_id = ?");
        $query->execute([$id]);

        return $query->fetch();
    }

    public function getByUserIdAndName(String $name, String $userId): ?Object {
        $query = $this->connection->prepare("SELECT category_id FROM category WHERE name LIKE ? AND user_id = ?");
        $query->execute(['%' . $name . '%', $userId]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    /**Traigo solo el nombre mediante el ID de la categoria seleccionada */
    public function getByIdWithName(String $id): Array {
        $query = $this->connection->prepare("SELECT name FROM category WHERE category_id = ?");
        $query->execute([$id]);

        return $query->fetchAll();
    }

    public function add(String $name, String $nameId, String $description, String $type, String $userId): Void {
        $query = $this->connection->prepare("INSERT INTO category (name, name_id, description, type, user_id) VALUES(?,?,?,?,?)");
        $query->execute([$name, $nameId, $description, $type, $userId]);
    }

    public function delete(String $id): Void {
        try {
            $query = $this->connection->prepare("DELETE FROM category WHERE category_id = ?");
            $query->execute([$id]);
        } catch(Exception $e) {
            throw new Exception('No se puede eliminar la categoria porque tiene autos asociados');
        }
    }

    public function update(String $id, String $name, String $nameId, String $description, String $type): Void {
        $query = $this->connection->prepare("UPDATE `category` SET `name` = ?, `name_id` = ?, `description` = ?, `type` = ? WHERE `category`.`category_id` = ?");
        $query->execute([$name, $nameId, $description, $type, $id]);
    }
}