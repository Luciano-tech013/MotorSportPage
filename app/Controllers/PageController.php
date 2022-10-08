<?php
require_once 'app/Models/autosModel.php';
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/tablesView.php';

class PageController {
    private $autosModel;
    private $categoriasModel;
    private $view;

    function __construct(){
        $this->autosModel = new autosModel();
        $this->categoriasModel = new categoriasModel();
        $this->view = new tablesView();
    }

    function showHome(){
        $autos_db = $this->autosModel->getAllAutos();
        $autosCategoria = $this->autosModel->getAllCategoryByAutos();
        var_dump($autosCategoria);
        $categorias_db = $this->categoriasModel->getAllCategorias();
        
        $this->view->showTable($autos_db, $categorias_db, $autosCategoria);
    }

    function showDetalle($id){
        $autos_db = $this->autosModel->getAllAutosDetalle($id);
        $this->view->showDescripcionAuto($autos_db);
    }

    function showFiltrado($id){
        $categorias = $this->categoriasModel->getAllCategorias();
        $autos = $this->categoriasModel->getAllAutosByCategoryId($id);
        $this->view->showListFiltrado($autos, $categorias);
    }

    function showPrivacidad(){
        $this->view->showPrivacidad();
    }
   
    function showContacto(){
        $this->view->showContacto();
    }

    function showCrearCuenta(){
        $this->view->showRegistrarse();
    }

}


