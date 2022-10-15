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
        $autos_db = $this->autosModel->getAllAutos();
        $categorias_db = $this->categoriasModel->getAllCategorias();
        $autos_db_2 = array();
        foreach($autos_db as $autos){
            foreach($categorias_db as $categorias){
                if($autos->id == $categorias->id_categorias){
                    array_push($autos_db_2, $categorias->nombre);
                }
            }
        }
        var_dump($autos_db_2);
        $this->MainView->showTable($autos_db, $autos_db_2, $categorias_db,);
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


