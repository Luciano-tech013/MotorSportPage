<?php

declare(strict_types=1);

class CategoryModel {
    
    private PDO $connection;
   
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function getAll(): array {
        $query = $this->connection->prepare("SELECT * FROM category WHERE user_id IS NULL");
        $query->execute();
    
        return $query->fetchAll();
    }

    public function getAllByUserId(int $userId): array {
        $query = $this->connection->prepare("SELECT * FROM category WHERE user_id = ?");
        $query->execute([$userId]);

        return $query->fetchAll();
    }

    public function getAllWithIdAndName(int $userId): array {
        $query = $this->connection->prepare("SELECT category_id, name FROM category WHERE user_id = ?");
        $query->execute([$userId]);

        return $query->fetchAll();
    }

    public function getById(string $id): ?object {
        $query = $this->connection->prepare("SELECT * FROM category WHERE category_id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByIdAndUserId(string $id, int $userId): ?object {
        $query = $this->connection->prepare("SELECT * FROM category WHERE category_id = ? AND user_id = ?");
        $query->execute([$id, $userId]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByIdWithDescription(string $id): ?object {
        $query = $this->connection->prepare("SELECT description FROM category WHERE category_id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }
    
    public function getByIdAndUserIdWithDescription(string $id, int $userId): ?object {
        $query = $this->connection->prepare("SELECT description FROM category WHERE category_id = ? AND user_id = ?");
        $query->execute([$id, $userId]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByIdWithName(string $id): array {
        $query = $this->connection->prepare("SELECT name FROM category WHERE category_id = ?");
        $query->execute([$id]);

        return $query->fetchAll();
    }

    public function getByIdAndUserIdWithName(string $id, int $userId): array {
        $query = $this->connection->prepare("SELECT name FROM category WHERE category_id = ? AND user_id = ?");
        $query->execute([$id, $userId]);

        return $query->fetchAll();
    }

    public function getByUserIdAndName(string $name, int $userId): ?object {
        $query = $this->connection->prepare("SELECT category_id FROM category WHERE name_id = ? AND user_id = ?");
        $query->execute([$name, $userId]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function addWithUserId(string $name, string $nameId, string $description, string $type, int $userId): void {
        $query = $this->connection->prepare("INSERT INTO category (name, name_id, description, type, user_id) VALUES(?,?,?,?,?)");

        $query->execute([$name, $nameId, $description, $type, $userId]);
    }

    public function deleteByIdAndUserId(string $id, int $userId): void {
        $query = $this->connection->prepare("DELETE FROM category WHERE category_id = ? AND user_id = ?");

        $query->execute([$id, $userId]);
    }

    public function update(string $id, string $name, string $nameId, string $description, string $type): void {
        $query = $this->connection->prepare("UPDATE `category` SET `name` = ?, `name_id` = ?, `description` = ?, `type` = ? WHERE `category`.`category_id` = ?");

        $query->execute([$name, $nameId, $description, $type, $id]);
    }
}