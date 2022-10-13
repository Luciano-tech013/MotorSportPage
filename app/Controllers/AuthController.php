<?php
require_once 'app/helpers/AuthHelper.php';
require_once 'app/Models/usuariosModel.php';
require_once 'app/Views/tablesView.php';

class AuthController {

    private $usuariosModel;
    private $view;
    private $helper;

    function __construct(){
        $this->usuariosModel = new usuariosModel();
        $this->view = new tablesView();
        $this->helper = new AuthHelper();
    }

    function createUser(){
        if(!empty($_POST['nombre'] && $_POST['password'] && $_POST['condiciones'])){
            $username = $_POST['nombre'];
            $userpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->usuariosModel->addUser($username, $userpassword);
            
            header("Location: " . BASE_URL . "login");
        } else {
            $this->view->showError("Complete los datos solicitados");
        }
    }

    function showFormLogin(){
        
        $this->view->showForm();
    }

    function validateUser(){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        
        $usuario = $this->usuariosModel->getUser($nombre);
        
        if(!empty($usuario) && password_verify($password, $usuario->password)) {
            session_start();
            $this->helper->login($usuario);

            header("Location: " . BASE_URL);
        } else {
            $this->view->showError("Nombre y Contraseña incorrectos");
        }
    }

    function logout(){
        
        $this->helper->destroyLogin();

        header("Location: " . BASE_URL);
    }
}
