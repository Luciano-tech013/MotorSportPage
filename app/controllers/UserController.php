<?php
require_once 'app/helpers/AuthHelper.php';
require_once 'app/models/UsuariosModel.php';
require_once 'app/views/UserView.php';

class UserController {

    private $usuariosModel;
    private $userView;
    private $authHelper;

    public function __construct(){
        $this->usuariosModel = new UsuariosModel();
        $this->userView = new UserView();
        $this->authHelper = new AuthHelper();
    }

    public function showFormRegistrarse(){
        $this->userView->showFormRegistrarse();
    }

    public function createUser(){
        if(!empty($_POST['nombre'] && $_POST['password'] && $_POST['condiciones'])){
            $username = $_POST['nombre'];
            $userpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->usuariosModel->add($username, $userpassword);
            
            header("Location: " . BASE_URL . "login");
        } else {
            $this->userView->showError("Complete los datos solicitados");
        }
    }

    public function showFormLogin(){
        $this->userView->showFormLogin();
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
            $this->userView->showError("Nombre y Contraseña incorrectos");
        }
    }

    public function logout(){
        $this->authHelper->destroyLogin();

        header("Location: " . BASE_URL);
    }

    public function showPrivacidad(){
        $this->userView->showPrivacidad();
    }
   
    public function showContacto(){
        $this->userView->showContacto();
    }

    public function showResourcesNotFound() {
        $this->userView->showResponse();
    }
}
