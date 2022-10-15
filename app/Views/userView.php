<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class userView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    
    function showPrivacidad(){
        $this->smarty->assign('titulo', "Politica & Privacidad");

        $this->smarty->display('app/Templates/privacidad.tpl');
    }

    function showContacto(){
        $this->smarty->assign('titulo', "Contactanos en: ");

        $this->smarty->display("app/Templates/contacto.tpl");
    }

    function showForm(){
        $this->smarty->display("app/Templates/form_login.tpl");
    }

    function showFormEditAutos($id, $autos, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('autos', $autos);

        $this->smarty->display("app/Templates/form_autos.edit.tpl");
    }

    function showFormEditCategorias($id, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);

        $this->smarty->display('app/Templates/form_categorias.edit.tpl');
    }

    function showError($msg){
        echo '<p class="text-center fs-1 badge text-bg-danger">' . $msg . '</p>';
    }
}