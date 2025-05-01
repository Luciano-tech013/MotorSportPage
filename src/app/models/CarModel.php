<?php

declare(strict_types=1);

class CarModel {
    
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /*Le agregue logica para evitar duplicar código. Si el id no es nulo, significa que hay que buscar filtrando por el id usuario*/
    public function getAllWithCategoryName(): array {
        $query = $this->connection->prepare("SELECT c.*, c2.name AS category_name FROM car c INNER JOIN category c2 ON c.category_id = c2.category_id WHERE c2.user_id IS NULL");
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllWithCategoryNameByUserId(int $userId): array {
        $query = $this->connection->prepare("SELECT c.*, c2.name AS category_name FROM car c INNER JOIN category c2 ON c.category_id = c2.category_id WHERE c2.user_id = ?");
        $query->execute([$userId]);

        return $query->fetchAll();
    }

    public function getAllByCategoryId(string $id): array {
        $query = $this->connection->prepare("SELECT c.*, c2.name AS category_name FROM car c INNER JOIN category c2 ON c.category_id = c2.category_id WHERE c.category_id = ?");
        $query->execute([$id]);

        return $query->fetchAll();
    }
    
    /**Traigo los autos mediante el ID para mostrar el filtrado de la categoria seleccionada */
    public function getAllByCategoryIdWithNameAndBrand(string $id): array {
        $query = $this->connection->prepare("SELECT name, brand FROM car WHERE category_id = ?");
        $query->execute([$id]);

        return $query->fetchAll();
    }

    public function getById(string $id): ?object {
        $query = $this->connection->prepare("SELECT * FROM car WHERE car_id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByIdWithCategoryIdAndName(string $id): ?object {
        $query = $this->connection->prepare("SELECT c.*, c2.name AS category_name, c2.category_id FROM car c JOIN category c2 ON c.category_id = c2.category_id WHERE car_id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByUserIdAndName(string $name, int $userId): ?object {
        $query = $this->connection->prepare("SELECT c.car_id FROM car c JOIN category c2 ON c.category_id = c2.category_id WHERE c.name LIKE ? AND c2.user_id = ?");
        $query->execute(['%' . $name . '%', $userId]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByIdWithDescription(string $id): ?object {
        $query = $this->connection->prepare("SELECT description FROM car WHERE car_id= ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function add(string $name, string $nameId, string $description, string $model, string $brand, string $category_id): void {
        $query = $this->connection->prepare("INSERT INTO car (name, name_id, description, model, brand, category_id) VALUES (?, ?, ?, ?, ?, ?)");

        $query->execute([$name, $nameId, $description, $model, $brand, $category_id]);
    }

    public function delete(string $id): void {
        $query = $this->connection->prepare("DELETE FROM car WHERE car_id = ?");

        $query->execute([$id]);
    }

    public function update(string $id, string $name, string $nameId, string $description, string $model, string $brand, string $category_id): void {
        $query = $this->connection->prepare("UPDATE car SET name = ?, name_id = ?, description = ?, model = ?, brand = ?, category_id = ? WHERE car_id = ?");

        $query->execute([$name, $nameId, $description, $model, $brand, $category_id, $id]);
    }
}
