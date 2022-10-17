<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class userView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showPrivacidad(){
        $this->smarty->assign('titulo', "Politica & Privacidad");

        $this->smarty->display('app/Templates/privacidad.tpl');
    }

    public function showContacto(){
        $this->smarty->assign('titulo', "Contactanos en: ");

        $this->smarty->display("app/Templates/contacto.tpl");
    }

    public function showFormRegistrarse(){
        $this->smarty->display('app/Templates/form_registrarse.tpl');
    }

    public function showFormLogin(){
        $this->smarty->display("app/Templates/form_login.tpl");
    }

    public function showError($msg){
        echo '<p class="text-center fs-1 badge text-bg-danger">' . $msg . '</p>';
    }
}