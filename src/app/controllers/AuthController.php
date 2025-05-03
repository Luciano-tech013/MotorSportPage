<?php

declare(strict_types=1);

require_once __DIR__ . '/../../middlewares/AuthHelper.php';
require_once __DIR__ . '/../../middlewares/FlashErrorsHelper.php';

class AuthController {

    private UserModel $userModel;
    
    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;
    }

    public function login(): void {
        $user = $this->userModel->getByUsername($_POST['username']);

        if(!isset($_POST['password'])) {
            header("Location: " . BASE_URL);
            return;
        }

        if(empty($user) || !password_verify($_POST['password'], $user->password)) {
            FlashErrorsHelper::addError("INVALID_USER", "El usuario o la contraseña son incorrectos. Por favor, verificalos e intentalo nuevamente.");
            header("Location: " . BASE_URL . "account/validate");
            return;
        }

        FlashErrorsHelper::clearErrors();

        $_SESSION["AUTH"]['USER_ID'] = $user->user_id;
        $_SESSION["AUTH"]['NAME'] = $user->name;
        $_SESSION["AUTH"]['PASSWORD'] = $user->password;
        $_SESSION["AUTH"]['IS_LOGGED'] = true;
    
        header("Location: " . BASE_URL);
    }

    public function logout(): void {
        AuthHelper::destroyLogin();

        header("Location: " . BASE_URL);
    }
}