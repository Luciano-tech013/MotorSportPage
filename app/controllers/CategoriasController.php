<?php
class CategoriasController {

    private static $instance;
    private $categoriasModel;
    private $motorView;
    private $authHelper;
    private $userView;

    private function __construct($categoriasModel, $motorView, $authHelper, $userView){
        $this->categoriasModel = $categoriasModel;
        $this->motorView = $motorView;
        $this->authHelper = $authHelper;
        $this->userView = $userView;
    }

    public static function getInstance($categoriasModel, $motorView, $authHelper, $userView) {
        if(!isset(self::$instance)) {
            self::$instance = new CategoriasController($categoriasModel, $motorView, $authHelper, $userView);
        }

        return self::$instance;
    }

    private function noExisteCategoria($id) {
        return empty($this->categoriasModel->getById($id));
    }

    public function showFiltrado($id){
        if($this->noExisteCategoria($id)) {
            $this->userView->showError("La categoria especificada no existe");
            die();
        }

        $categorias = $this->categoriasModel->getByIdWithName($id);
        $autos = $this->categoriasModel->getAllAutosByCategoryId($id);
        $this->motorView->showListFiltrado($categorias, $autos);
    }

    /**CRUD de la tabla categorias*/
    public function addCategorias(){
        $this->authHelper->checkLoggedAndRedict();

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            $id_usuario = $this->authHelper->getUserId();

            $this->categoriasModel->add($nombre, $descripcion, $tipo, $id_usuario);

            header("Location: " . BASE_URL);
        } else{
            $this->userView->showError("Complete todos los campos");
        }
    }

    public function deleteCategorias($id){
        $this->authHelper->checkLoggedAndRedict();
        
        if($this->noExisteCategoria($id)) {
            $this->userView->showError("La categoria solicitado no existe en el sistema");
            die();
        }

        $this->categoriasModel->delete($id);
        if($this->categoriasModel->delete($id)){
            $this->userView->showError("Tiene que eliminar los autos que pertenecen a esta categoria primero");
            die();
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function showFormCat($id){
        $this->authHelper->checkLoggedAndRedict();

        if($this->noExisteCategoria($id)) {
            $this->userView->showError("La categoria solicida no existe en el sistema");
            die();
        }

        $categorias = $this->categoriasModel->getById($id);
        $this->motorView->showFormEditCat($id,$categorias);
    }

    public function updateCategorias($id){
        $this->authHelper->checkLoggedAndRedict();
        
        if($this->noExisteCategoria($id)) {
            $this->userView->showError("La categoria solicitada no existe en el sistema");
            die();
        }

        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            
            $this->categoriasModel->update($id, $nombre, $descripcion, $tipo);
            header("Location: " . BASE_URL);
        }
    }
}