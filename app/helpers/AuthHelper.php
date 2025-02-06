<?php

class AuthHelper {
   
    public function destroyLogin(){
        session_start();
        session_destroy();
    }

    public function checkLoggedAndRedict() {
        if(!$this->isLogged()) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }

    public function isLogged() {
        session_start();
        return isset($_SESSION['IS_LOGGED']);
    }

    public function getUserId() {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
        
        return $_SESSION['ID_USUARIO'];
    }
}