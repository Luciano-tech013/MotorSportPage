<?php

class AuthHelper {
    public static function destroyLogin(){
        session_destroy();
        session_unset();
    }

    public static function checkLoggedAndRedict() {
        if(!self::isLogged()) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }

    public static function isLogged() {
        return isset($_SESSION["AUTH"]['IS_LOGGED']);
    }

    public static function getUserId() {
        return isset($_SESSION["AUTH"]['USER_ID']) ? $_SESSION["AUTH"]['USER_ID'] : null;
    }
}