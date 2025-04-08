<?php
class AutosController {
    
    private static $instance;
    private $autosModel;
    private $categoriasModel;
    private $motorView;
    private $userView;
    private $authHelper;
    
    private function __construct($autosModel, $categoriasModel, $motorView, $userView, $authHelper) {
        $this->autosModel = $autosModel;
        $this->categoriasModel = $categoriasModel;
        $this->motorView = $motorView;
        $this->userView = $userView;
        $this->authHelper = $authHelper;
    }

    public static function getInstance($autosModel, $categoriasModel, $motorView, $userView, $authHelper){
        if(self::$instance == null) {
            self::$instance = new AutosController($autosModel, $categoriasModel, $motorView, $userView, $authHelper);
        }
        
        return self::$instance;
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

    public function showDetalle($params){
        $id = $params[":ID"];

        if($this->noExisteAuto($id)) {
            $this->userView->showError("El auto solicitado no existe en el sistema");
            die();
        }

        $auto = $this->autosModel->getByDetalle($id);
        $this->motorView->showDescripcion($auto);
    }

    /**CRUD de la tabla autoss*/
    public function addAutos(){
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

    public function deleteAutos($params){
        $id = $params[":ID"];

        $this->authHelper->checkLoggedAndRedict();
        
        if($this->noExisteAuto($id)) {
            $this->userView->showError("El auto solicitado no existe en el sistema");
            die();
        }    
    
        $this->autosModel->delete($id);
        header("Location: " . BASE_URL);
    }

    public function showFormAutos($params){
        $id = $params[":ID"];

        $this->authHelper->checkLoggedAndRedict();

        if($this->noExisteAuto($id)) {
            $this->userView->showError("El auto solicitado no existe en el sistema");
            die();
        }
        
        $autos = $this->autosModel->getById($id);
        $categorias = $this->categoriasModel->getAllByIdUser($this->authHelper->getUserId());
        $this->motorView->showFormEditAutos($id, $autos, $categorias);
    }

    public function updateAutos($params){
        $id = $params[":ID"];
        
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

    public function showError($error){
        $this->userView->showError($error);
    }
}


