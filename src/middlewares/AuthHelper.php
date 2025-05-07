<?php

declare(strict_types=1);

class AuthHelper {
    public static function destroyLogin(){
        session_destroy();
        session_unset();
    }

    public static function checkLoggedAndRedict() {
        if(!self::isLogged()) {
            header("Location: " . BASE_URL . 'account/validate');
            die();
        }
    }

    public static function isLogged() {
        return isset($_SESSION["AUTH"]['IS_LOGGED']);
    }

    public static function getUserId() {
        return isset($_SESSION["AUTH"]['USER_ID']) ? $_SESSION["AUTH"]['USER_ID'] : null;
    }

    public static function initSession(object $user): void {
        $_SESSION["AUTH"]['USER_ID'] = $user->user_id;
        $_SESSION["AUTH"]['NAME'] = $user->name;
        $_SESSION["AUTH"]['PASSWORD'] = $user->password;
        $_SESSION["AUTH"]['IS_LOGGED'] = true;
    }
}