<?php

class AuthController {

    private static AuthController $instance;
    private UserModel $userModel;
    private AuthHelper $authHelper;
    private FormView $formView;

    private function __construct(UserModel $userModel, AuthHelper $authHelper, FormView $formView) {
        $this->userModel = $userModel;
        $this->authHelper = $authHelper;
        $this->formView = $formView;
    }

    public static function getInstance(UserModel $userModel, AuthHelper $authHelper, FormView $formView): AuthController {
        if(!isset(self::$instance))
            self::$instance = new AuthController($userModel, $authHelper, $formView);

        return self::$instance;
    }

    public function login(): Void {
        //Capturo datos del form 
        $fields = $this->getFields();

        //Me evito llamada a la base
        $this->validateFields();

        //Me traigo el Usuario de mi tabla usuarios
        $user = $this->userModel->getByUsername($fields['username']);
        
        //Verifico que sean correcto los datos traidos con los que ingreso el usuario por el formulario
        $errors = ["incorrect" => true];
        if(!$user || !password_verify($fields['password'], $user->password)) {
            $this->formView->showFormUser('signin.form.tpl', $errors);
            die();
        } 

        //Inicio sesion
        session_start();
        $_SESSION['USER_ID'] = $user->user_id;
        $_SESSION['NAME'] = $user->name;
        $_SESSION['PASSWORD'] = $user->password;
        $_SESSION['IS_LOGGED'] = true;
            
        header("Location: " . BASE_URL);
    }

    public function logout(): Void {
        $this->authHelper->destroyLogin();

        header("Location: " . BASE_URL);
    }

    private function getFields(): Array {
        return [
            "username" => $_POST["username"] ?? "",
            "password" => $_POST["password"] ?? ""
        ];
    }

    private function validateFields(): Void {
        $fields = $this->getFields();
        $errors = ValidatorFields::searchIncorrectFields($fields);
        if (!empty($errors)) {
            $this->formView->showFormUser('signin.form.tpl', $errors);
            die();
        }
    }
}