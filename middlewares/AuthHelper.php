<?php

class AuthHelper {
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new AuthHelper();
        }

        return self::$instance;
    }
   
    public function destroyLogin(){
        session_start();
        session_destroy();
    }

    public function checkLoggedAndRedict() {
        session_start();
        if(!$this->isLogged()) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }

    public function isLogged() {
        return isset($_SESSION['IS_LOGGED']);
    }

    public function getUserId() {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
        
        return isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : null;
    }
}