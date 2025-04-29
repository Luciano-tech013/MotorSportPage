<?php

class UserModel {

    private static UserModel $instance;
    private PDO $connection;
    
    private function __construct(Connection $connection){
        try {
            $connection->connect();
        } catch(PDOException $e) {
            throw new Error($e);
        }

        $this->connection = $connection->getConnection();
    }
    
    public static function getInstance(Connection $connection): UserModel {
        if (!isset(self::$instance)) {
            self::$instance = new UserModel($connection);
        }

        return self::$instance;
    }
    
    public function getByUsername(String $username): ?Object {
        $query = $this->connection->prepare("SELECT * FROM user WHERE name = ?");
        $query->execute([$username]);

        $result = $query->fetch();
        
        return $result == false ? null : $result;
    }

    public function getByUserIdAndName(String $nameId): ?Object {
        $query = $this->connection->prepare("SELECT user_id FROM user WHERE name_id LIKE ?");
        $query->execute(['%' . $nameId . '%']);

        $result = $query->fetch();

        return $result == false ? null : $result;
    }

    public function add(String $username, String $userpassword, String $nameId): Void {
        $query = $this->connection->prepare("INSERT INTO user (name, password, name_id) VALUES (?, ?, ?)");
        $query->execute([$username, $userpassword, $nameId]);
    }
}