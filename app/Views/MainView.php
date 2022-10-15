<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
require_once 'app/helpers/AuthHelper.php';

class MainView {
    
    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }

    function showTable($autos_db, $categorias_db){
        $this->smarty->assign('titulo_autos', "Lista de Autos");
        $this->smarty->assign('titulo_categorias', "Categorias a las que pertenecen");
        
        $this->smarty->assign('autos', $autos_db);
        $this->smarty->assign('categorias', $categorias_db);
        
        $this->smarty->display('app/Templates/tablaAutos.tpl');
        $this->smarty->display('app/Templates/form_autos.tpl');
        $this->smarty->display('app/Templates/tablaCategorias.tpl');
        $this->smarty->display('app/Templates/form_categoria.tpl');
        $this->smarty->display('app/Templates/footer.tpl');
    }

    function showDescripcionAuto($autos_db){
        $this->smarty->assign('titulo', "Descripcion del auto");
        $this->smarty->assign('autos', $autos_db);

        $this->smarty->display('app/Templates/detalleAuto.tpl');
    }

    function showListFiltrado($autos, $categorias){
        $this->smarty->assign('autos', $autos);
        $this->smarty->assign('categorias', $categorias);
        
        
        $this->smarty->display('app/Templates/filtrado.tpl');
    }

    function showError($msg){
        echo '<p class="text-center fs-1 badge text-bg-danger">' . $msg . '</p>';
    }

}