<?php
require_once 'app/models/CategoriasModel.php';
require_once 'app/views/MotorView.php';
require_once 'app/helpers/AuthHelper.php';

class CategoriasController {

    private $categoriasModel;
    private $motorView;
    private $authHelper;

    public function __construct(){
        $this->categoriasModel = new categoriasModel();
        $this->motorView = new MotorView();
        $this->authHelper = new AuthHelper();
    }

    public function showFiltrado($id){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        $categorias = $this->categoriasModel->getByIdWithName($id);
        $autos = $this->categoriasModel->getAllAutosByCategoryId($id);
        $this->motorView->showListFiltrado($categorias, $autos);
    }

    /**CRUD de la tabla categorias*/
    public function addCategorias(){
        $this->authHelper->checkLogged();

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];

            $this->categoriasModel->add($nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        } else{
            $this->motorView->showError("Complete todos los campos");
        }
    }

    public function deleteCategorias($id){
        $this->authHelper->checkLogged();
        
        $this->categoriasModel->delete($id);
        if($this->categoriasModel->delete($id)){
            $this->motorView->showError("Tiene que eliminar los autos que pertenecen a esta categoria primero");
            die();
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function showFormCat($id){
        $categorias = $this->categoriasModel->getById($id);
        $this->motorView->showFormEditCat($id,$categorias);
    }

    public function updateCategorias($id){
        $this->authHelper->checkLogged();
        
        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            
            $this->categoriasModel->update($id, $nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        }
    }
}