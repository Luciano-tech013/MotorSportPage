<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class AutosView {
    
    private $smarty;
    
    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showTable($autos_db, $categorias_db){
        $this->smarty->assign('titulo', "Lista de Autos");
        
        $this->smarty->assign('autos', $autos_db);
        $this->smarty->assign('categorias', $categorias_db);
        
        $this->smarty->display('app/Templates/tablaAutos.tpl');
        
        /**$this->smarty->display('app/Templates/form_autos.tpl');*/
    
    }

    public function showDescripcion($autos_db){
        $this->smarty->assign('titulo', "Descripcion del auto");
        $this->smarty->assign('autos', $autos_db);

        $this->smarty->display('app/Templates/detalleAuto.tpl');
    }

    public function showFormEdit($id, $autos, $categorias){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('autos', $autos);

        $this->smarty->display("app/Templates/form_autos.edit.tpl");
    }

    public function showError($msg){
        echo '<p class="text-center fs-1 badge text-bg-danger">' . $msg . '</p>';
    }

}