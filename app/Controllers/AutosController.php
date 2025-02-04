<?php
require_once 'app/models/AutosModel.php';
require_once 'app/models/CategoriasModel.php';
require_once 'app/views/MotorView.php';
require_once 'app/views/UserView.php';
require_once 'app/helpers/AuthHelper.php';

class AutosController {
    
    private $autosModel;
    private $categoriasModel;
    private $motorView;
    private $userView;
    private $authHelper;
    
    public function __construct(){
        $this->autosModel = new autosModel();
        $this->categoriasModel = new categoriasModel();
        $this->motorView = new MotorView();
        $this->userView = new userView();
        $this->authHelper = new AuthHelper();
    }

    public function showHome(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        $autos = $this->categoriasModel->getCategoryNameWithAllAutos();
        $categorias = $this->categoriasModel->getAll();
        $this->motorView->showTable($autos, $categorias);
    }

    public function showDetalle($id){
        $auto = $this->autosModel->getByDetalle($id);
        $this->motorView->showDescripcion($auto);
    }

    /**CRUD de la tabla autoss*/
    public function addItems(){
        $this->authHelper->checkLogged();

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['modelo'] && $_POST['marca'] && $_POST['categoria'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $id_categoria = $_POST['categoria'];

            $this->autosModel->add($nombre, $descripcion, $modelo, $marca, $id_categoria);
            
            header("Location: " . BASE_URL);
        } else {
            $this->userView->showError("Debe completar los datos solicitados!!");
        }
    }

    public function deleteItems($id){
        $this->authHelper->checkLogged();

        if(!isset($_POST['id']) && empty($_POST['id'])){
            $this->userView->showError("No se puede eliminar");
        }

        $this->autosModel->delete($id);

        header("Location: " . BASE_URL);
    }

    public function showFormItems($id){
        $autos = $this->autosModel->getById($id);
        $categorias = $this->categoriasModel->getAll();
        $this->motorView->showFormEditAutos($id, $autos, $categorias);
    }

    public function updateItem($id){
        $this->authHelper->checkLogged();

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


