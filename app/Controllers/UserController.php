<?php
require_once 'app/helpers/AuthHelper.php';
require_once 'app/Models/usuariosModel.php';
require_once 'app/Views/userView.php';

class UserController {

    private $usuariosModel;
    private $view;
    private $helper;

    public function __construct(){
        $this->usuariosModel = new usuariosModel();
        $this->view = new userView();
        $this->helper = new AuthHelper();
    }

    public function showFormRegistrarse(){
        $this->view->showFormRegistrarse();
    }

    public function createUser(){
        if(!empty($_POST['nombre'] && $_POST['password'] && $_POST['condiciones'])){
            $username = $_POST['nombre'];
            $userpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->usuariosModel->add($username, $userpassword);
            
            header("Location: " . BASE_URL . "login");
        } else {
            $this->view->showError("Complete los datos solicitados");
        }
    }

    public function showFormLogin(){
        $this->view->showFormLogin();
    }

    public function validateUser(){
        /**Capturo datos del form */
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        
        /**Me traigo el Usuario de mi tabla usuarios */
        $usuario = $this->usuariosModel->get($nombre);
        
        /**Verifico que sean correcto los datos traidos con los que ingreso el usuario por el formulario */
        if($usuario && password_verify($password,$usuario->password)) {
            /**Inicio sesion */
            session_start();
            $_SESSION['ID_USUARIO'] = $usuario->id;
            $_SESSION['NOMBRE'] = $usuario->nombre;
            $_SESSION['PASSWORD'] = $usuario->password;
            $_SESSION['IS_LOGGED'] = true;
            
            header("Location: " . BASE_URL);
        } else {
            $this->view->showError("Nombre y Contraseña incorrectos");
        }
    }

    public function logout(){
        
        $this->helper->destroyLogin();

        header("Location: " . BASE_URL);
    }

    public function showPrivacidad(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $this->view->showPrivacidad();
    }
   
    public function showContacto(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $this->view->showContacto();
    }
}
