<?php
class UserModel {

    private PDO $connection;
    
    public function __construct(PDO $connection){
        $this->connection = $connection;
    }
    
    public function getByUsername(string $username): ?object {
        $query = $this->connection->prepare("SELECT * FROM user WHERE name = ?");
        $query->execute([$username]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getByUserIdAndName(string $nameId): ?object {
        $query = $this->connection->prepare("SELECT user_id FROM user WHERE name_id LIKE ?");
        $query->execute(['%' . $nameId . '%']);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function getById(string|int $id): ?object {
        $query = $this->connection->prepare("SELECT * FROM user WHERE user_id = ?");
        $query->execute([$id]);

        $result = $query->fetch();
        return $result == false ? null : $result;
    }

    public function add(string $username, string $userpassword, string $nameId): string {
        $query = $this->connection->prepare("INSERT INTO user (name, password, name_id) VALUES (?, ?, ?)");
        $query->execute([$username, $userpassword, $nameId]);

        return $this->connection->lastInsertId();
    }

    public function delete(string $id) {
        $query = $this->connection->prepare("DELETE FROM user WHERE user_id = ?");
        $query->execute([$id]);
    }
}