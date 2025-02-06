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
        $this->autosModel = new AutosModel();
        $this->categoriasModel = new CategoriasModel();
        $this->motorView = new MotorView();
        $this->userView = new UserView();
        $this->authHelper = new AuthHelper();
    }

    private function noExisteAuto($id) {
        return empty($this->autosModel->getById($id));
    }

    public function showHome(){
        if($this->authHelper->isLogged()) {
            $id_usuario = $this->authHelper->getUserId();
            
            $autos = $this->categoriasModel->getCategoryNameWithAllAutosByIdUser($id_usuario);
            $categorias = $this->categoriasModel->getAllByIdUser($id_usuario);
        } else {
            $autos = $this->categoriasModel->getCategoryNameWithAllAutos();
            $categorias = $this->categoriasModel->getAll();
        }

        $this->motorView->showTable($autos, $categorias);
    }

    public function showDetalle($id){
        if($this->noExisteAuto($id)) {
            $this->userView->showError("El auto solicitado no existe en el sistema");
            die();
        }

        $auto = $this->autosModel->getByDetalle($id);
        $this->motorView->showDescripcion($auto);
    }

    /**CRUD de la tabla autoss*/
    public function addItems(){
        $this->authHelper->checkLoggedAndRedict();

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
        $this->authHelper->checkLoggedAndRedict();
        
        if($this->noExisteAuto($id)) {
            $this->userView->showError("El auto solicitado no existe en el sistema");
            die();
        }    
    
        $this->autosModel->delete($id);
        header("Location: " . BASE_URL);
    }

    public function showFormItems($id){
        $this->authHelper->checkLoggedAndRedict();

        if($this->noExisteAuto($id)) {
            $this->userView->showError("El auto solicitado no existe en el sistema");
            die();
        }
        
        $autos = $this->autosModel->getById($id);
        $categorias = $this->categoriasModel->getAllByIdUser($this->authHelper->getUserId());
        $this->motorView->showFormEditAutos($id, $autos, $categorias);
    }

    public function updateItem($id){
        $this->authHelper->checkLoggedAndRedict();

        if($this->noExisteAuto($id)) {
            $this->userView->showError("El auto solicitado no existe en el sistema");
            die();
        }

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


