<?php
class CarModel {
    
    private static CarModel $instance;
    private PDO $connection;

    private function __construct(Connection $connection) {
        try {
            $connection->connect();
            $this->connection = $connection->getConnection();
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }

    public static function getInstance(Connection $connection): CarModel {
        if(!isset(self::$instance)) {
            self::$instance = new CarModel($connection);
        }
        return self::$instance;
    }

    public function getAll(): Array {
        $query = $this->connection->prepare("SELECT * FROM car");
        $query->execute();

        return $query->fetchAll();
    }

    /* Este metodo sirve para mostrar el nombre de la categoria en la tablas y para renderizar el template dentro de un usuario admin*/
    public function getAllByUserIdWithCategoryName(String $userId): Array {
        $query = $this->connection->prepare("SELECT c.*, c2.name AS category_name FROM car c INNER JOIN category c2 ON c.category_id = c2.category_id WHERE c2.user_id = ?");
        $query->execute([$userId]);

        return $query->fetchAll();
    }

    /* Este metodo sirve para mostrar el nombre de la categoria en la tablas y para renderizar el template dentro de un usuario admin*/
    public function getAllWithCategoryName(): Array {
        $query = $this->connection->prepare("SELECT c.*, c2.name AS category_name FROM car c INNER JOIN category c2 ON c.category_id = c2.category_id");
        $query->execute();

        return $query->fetchAll();
    }

    /**Traigo los autos mediante el ID para mostrar el filtrado de la categoria seleccionada */
    public function getAllByCategoryId($id): Array {
        $query = $this->connection->prepare("SELECT * FROM car WHERE category_id = ?");
        $query->execute([$id]);

        return $query->fetchAll();
    }

    public function getById(String $id): ?Object {
        $query = $this->connection->prepare("SELECT * FROM car WHERE car_id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByIdWithCategoryIdAndName(String $id): ?Object {
        $query = $this->connection->prepare("SELECT c.*, c2.name AS category_name, c2.category_id FROM car c JOIN category c2 ON c.category_id = c2.category_id WHERE car_id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByUserIdAndName(String $name, String $userId): ?Object {
        $query = $this->connection->prepare("SELECT c.car_id FROM car c JOIN category c2 ON c.category_id = c2.category_id WHERE c.name LIKE ? AND c2.user_id = ?");
        $query->execute(['%' . $name . '%', $userId]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByIdWithDescription(String $id): ?Object {
        $query = $this->connection->prepare("SELECT description FROM car WHERE car_id= ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function add(String $name, String $nameId, String $description, String $model, String $brand, String $category_id): Void {
        $query = $this->connection->prepare("INSERT INTO car (name, name_id, description, model, brand, category_id) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $nameId, $description, $model, $brand, $category_id]);
    }

    public function delete(String $id): Void {
        $query = $this->connection->prepare("DELETE FROM car WHERE car_id = ?");
        $query->execute([$id]);
    }

    public function update(String $id, String $name, String $nameId, String $description, String $model, String $brand, String $category_id): Void {
        $query = $this->connection->prepare("UPDATE car SET name = ?, name_id = ?, description = ?, model = ?, brand = ?, category_id = ? WHERE car_id = ?");
        $query->execute([$name, $nameId, $description, $model, $brand, $category_id, $id]);
    }
}
