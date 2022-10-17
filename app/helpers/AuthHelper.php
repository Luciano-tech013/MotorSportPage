<?php

class AuthHelper {
   
    public function destroyLogin(){
        session_start();
        session_destroy();
    }

    public function checkLogged() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }
}