<?php
require_once 'app/Models/autosModel.php';
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/MainView.php';
require_once 'app/Views/userView.php';
require_once 'app/helpers/AuthHelper.php';

class PageController {
    private $autosModel;
    private $categoriasModel;
    private $userView;
    private $MainView;
    
    function __construct(){
        $this->autosModel = new autosModel();
        $this->categoriasModel = new categoriasModel();
        $this->userView = new userView();
        $this->MainView = new MainView();

        /**$authHelper = new AuthHelper();
        $authHelper->checkLogged();*/
    }

    function showHome(){
        $autos_db = $this->categoriasModel->getAllAutosAndCategoryName();
        $categorias_db = $this->categoriasModel->getAllCategorias();
        $this->MainView->showTable($autos_db, $categorias_db,);
    }

    function showDetalle($id){
        session_start();
        $autos_db = $this->autosModel->getAllAutosDetalle($id);
        $this->MainView->showDescripcionAuto($autos_db);
    }

    function showFiltrado($id){
        session_start();
        $categorias = $this->categoriasModel->getAllNameCategorias($id);
        $autos = $this->categoriasModel->getAllAutosByCategoryId($id);
        $this->MainView->showListFiltrado($autos, $categorias);
    }

    function showPrivacidad(){
        session_start();
        $this->userView->showPrivacidad();
    }
   
    function showContacto(){
        session_start();
        $this->userView->showContacto();
    }
}


