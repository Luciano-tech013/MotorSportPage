<?php
require_once 'app/Models/autosModel.php';
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/tablesView.php';
require_once 'app/helpers/AuthHelper.php';

class PageController {
    private $autosModel;
    private $categoriasModel;
    private $view;
    private $helper;

    function __construct(){
        $this->autosModel = new autosModel();
        $this->categoriasModel = new categoriasModel();
        $this->view = new tablesView();
        $this->helper = new AuthHelper();
    }

    function showHome(){
        session_start();
        
        $autos_db = $this->autosModel->getAllAutos();
        $autosCategoria = $this->autosModel->getAllCategoryByAutos();
        /**var_dump($autosCategoria);*/
        $categorias_db = $this->categoriasModel->getAllCategorias();
        
        $this->view->showTable($autos_db, $categorias_db, $autosCategoria);
    }

    function showDetalle($id){
        session_start();
        $autos_db = $this->autosModel->getAllAutosDetalle($id);
        $this->view->showDescripcionAuto($autos_db);
    }

    function showFiltrado($id){
        session_start();
        $categorias = $this->categoriasModel->getAllNameCategorias($id);
        $autos = $this->categoriasModel->getAllAutosByCategoryId($id);
        $this->view->showListFiltrado($autos, $categorias);
    }

    function showPrivacidad(){
        session_start();
        $this->view->showPrivacidad();
    }
   
    function showContacto(){
        session_start();
        $this->view->showContacto();
    }

    function showCrearCuenta(){
        session_start();
        $this->view->showRegistrarse();
    }

}


