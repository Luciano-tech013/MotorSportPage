<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class MotorView {

    private $smarty;
    
    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showTable($autos_db, $categorias_db){
        $this->smarty->assign('autos', $autos_db);
        $this->smarty->assign('categorias', $categorias_db);

        $this->smarty->display('app/Templates/tablaAutos.tpl');
        $this->smarty->display('app/Templates/tablaCategorias.tpl');
    }

    public function showDescripcion($autos_db){
        $this->smarty->assign('titulo', "Descripcion del auto");
        $this->smarty->assign('autos', $autos_db);

        $this->smarty->display('app/Templates/detalleAuto.tpl');
    }

    public function showListFiltrado($categorias, $autos){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('autos', $autos);
       
        $this->smarty->display('app/Templates/filtrado.tpl');
    }

    public function showFormEditAutos($id, $autos, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('autos', $autos);

        $this->smarty->display("app/Templates/form_autos.edit.tpl");
    }

    public function showFormEditCat($id, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);

        $this->smarty->display('app/Templates/form_categorias.edit.tpl');
    }

    public function showError($error){
        $this->smarty->assign('error', $error);

        $this->smarty->display("app/Templates/alert.tpl");
    }
}