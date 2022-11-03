<?php
require_once 'app/Models/autosModel.php';
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/MotorView.php';
require_once 'app/Views/userView.php';
require_once 'app/helpers/AuthHelper.php';

class AutosController {
    
    private $autosModel;
    private $categoriasModel;
    private $userView;
    private $view;
    private $helper;
    
    public function __construct(){
        $this->autosModel = new autosModel();
        $this->categoriasModel = new categoriasModel();
        $this->userView = new userView();
        $this->view = new MotorView();
        $this->helper = new AuthHelper();
    }

    public function showHome(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $autos_db = $this->categoriasModel->getAllAutosAndCategoryName();
        $categorias_db = $this->categoriasModel->getAll();
        $this->view->showTable($autos_db, $categorias_db);
    }

    public function showDetalle($id){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $autos_db = $this->autosModel->getAllDetalle($id);
        $this->view->showDescripcion($autos_db);
    }

    /**CRUD de la tabla autoss*/
    public function addItems(){
        $this->helper->checkLogged();

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['modelo'] && $_POST['marca'] && $_POST['categoria'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $id_categoria = $_POST['categoria'];

            $this->autosModel->add($nombre, $descripcion, $modelo, $marca, $id_categoria);
            
            header("Location: " . BASE_URL);
        } else {
            $this->view->showError("Debe completar los datos solicitados!!");
        }
    }

    public function deleteItems($id){
        $this->helper->checkLogged();

        if(!isset($_POST['id']) && empty($_POST['id'])){
            $this->view->showError("Error: No se puede eliminar");
        }

        $this->autosModel->delete($id);

        header("Location: " . BASE_URL);
    }

    public function showFormItems($id){
        $autos = $this->autosModel->getAllForEdit($id);
        $categorias = $this->categoriasModel->getAll();
        $this->view->showFormEditAutos($id, $autos, $categorias);
    }

    public function updateItem($id){
        $this->helper->checkLogged();

        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['modelo']) && isset($_POST['marca']) && isset($_POST['categoria'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $id_categoria = $_POST['categoria'];
        
            $this->autosModel->update($id, $nombre, $descripcion, $modelo, $marca, $id_categoria);

            header("Location: " . BASE_URL);
        } 
    }

}


