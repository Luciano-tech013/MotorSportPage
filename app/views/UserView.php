<?php
class UserView {

    private static $instance;
    private $smarty;

    private function __construct($smarty){
        $this->smarty = $smarty;
    }

    public static function getInstance($smarty){
        if (!isset(self::$instance)) {
            self::$instance = new UserView($smarty);
        }

        return self::$instance;
    }

    public function showTable($autos_db, $categorias_db){
        $this->smarty->assign('autos', $autos_db);
        $this->smarty->assign('categorias', $categorias_db);
        $this->smarty->assign('error', 'Tiene que eliminar los autos que pertenecen a esta categoria primero');

        $this->smarty->display('app/templates/tablaAutos.tpl');
        $this->smarty->display('app/templates/tablaCategorias.tpl');
    }

    public function showPrivacidad(){
        $this->smarty->assign('titulo', "Politica & Privacidad");

        $this->smarty->display('app/templates/privacidad.tpl');
    }

    public function showContacto(){
        $this->smarty->assign('titulo', "Contactanos en: ");

        $this->smarty->display("app/templates/contacto.tpl");
    }

    public function showFormRegistrarse(){
        $this->smarty->display('app/templates/form_registrarse.tpl');
    }

    public function showFormLogin(){
        $this->smarty->display("app/templates/form_login.tpl");
    }

    public function showError($error){
        $this->smarty->assign('error', $error);

        $this->smarty->display("app/templates/alert.tpl");
    }

    public function showResponse() {
        $this->smarty->display("app/templates/response.tpl");
    }
}