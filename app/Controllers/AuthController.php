<?php
require_once 'app/helpers/AuthHelper.php';
require_once 'app/Models/usuariosModel.php';
require_once 'app/Views/userView.php';

class AuthController {

    private $usuariosModel;
    private $userView;
    private $helper;

    function __construct(){
        $this->usuariosModel = new usuariosModel();
        $this->userView = new userView();
        $this->helper = new AuthHelper();
    }

    function showFormLogin(){
        $this->userView->showForm();
    }

    function validateUser(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        
        $usuario = $this->usuariosModel->getUser($nombre);
        
        if($usuario && password_verify($password, $usuario->password)) {
            session_start();
            $_SESSION['ID_USUARIO'] = $usuario->id;
            $_SESSION['NOMBRE'] = $usuario->nombre;
            $_SESSION['PASSWORD'] = $usuario->password;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: " . BASE_URL);
        } else {
            $this->userView->showError("Nombre y Contraseña incorrectos");
        }
    }

    function logout(){
        
        $this->helper->destroyLogin();

        header("Location: " . BASE_URL);
    }
}
