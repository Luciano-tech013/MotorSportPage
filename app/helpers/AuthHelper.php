<?php

class AuthHelper {
    
    function login($usuario){
        
    }

    function destroyLogin(){
        session_start();
        session_destroy();
    }

    function checkLogged() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }
}