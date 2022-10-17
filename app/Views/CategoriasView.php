<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class CategoriasView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showTable($categorias_db){
        $this->smarty->assign('titulo', "Categorias a las que pertenecen");
        
        $this->smarty->assign('categorias', $categorias_db);
        
        $this->smarty->display('app/Templates/tablaCategorias.tpl');
    }

    public function showListFiltrado($categorias, $autos){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('autos', $autos);
       
        $this->smarty->display('app/Templates/filtrado.tpl');
    }

    public function showFormEdit($id, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);

        $this->smarty->display('app/Templates/form_categorias.edit.tpl');
    }

    public function showError($msg){
        echo '<p class="text-center fs-1 badge text-bg-danger">' . $msg . '</p>';
    }

}