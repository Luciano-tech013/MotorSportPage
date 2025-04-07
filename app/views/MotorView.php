<?php

class MotorView {

    private static $instance;
    private $smarty;
    
    public function __construct($smarty){
        $this->smarty = $smarty;
    }

    public static function getInstance($smarty) {
        if(!isset(self::$instance)) {
            self::$instance = new MotorView($smarty);
        }

        return self::$instance;
    } 

    public function showTable($autos, $categorias){
        $this->smarty->assign('autos', $autos);
        $this->smarty->assign('categorias', $categorias);

        $this->smarty->display('app/templates/tablaAutos.tpl');
        $this->smarty->display('app/templates/tablaCategorias.tpl');
    }

    public function showDescripcion($autos_db){
        $this->smarty->assign('titulo', "Descripcion del auto");
        $this->smarty->assign('autos', $autos_db);

        $this->smarty->display('app/templates/detalleAuto.tpl');
    }

    public function showListFiltrado($categorias, $autos){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('autos', $autos);
       
        $this->smarty->display('app/templates/filtrado.tpl');
    }

    public function showFormEditAutos($id, $autos, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('autos', $autos);

        $this->smarty->display("app/templates/form_autos.edit.tpl");
    }

    public function showFormEditCat($id, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);

        $this->smarty->display('app/templates/form_categorias.edit.tpl');
    }

    public function showError($error){
        $this->smarty->assign('error', $error);

        $this->smarty->display("app/templates/alert.tpl");
    }
}