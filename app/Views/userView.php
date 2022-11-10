<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class userView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showTable($autos_db, $categorias_db){
        $this->smarty->assign('autos', $autos_db);
        $this->smarty->assign('categorias', $categorias_db);
        $this->smarty->assign('error', 'Tiene que eliminar los autos que pertenecen a esta categoria primero');

        $this->smarty->display('app/Templates/tablaAutos.tpl');
        $this->smarty->display('app/Templates/tablaCategorias.tpl');
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

    public function showError($error){
        $this->smarty->assign('error', $error);

        $this->smarty->display("app/Templates/alert.tpl");
    }
}