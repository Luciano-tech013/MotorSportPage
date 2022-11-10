<?php
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/MotorView.php';
require_once 'app/helpers/AuthHelper.php';

class CategoriasController {

    private $model;
    private $view;
    private $helper;

    public function __construct(){
        $this->model = new categoriasModel();
        $this->view = new MotorView();
        $this->helper = new AuthHelper();
    }

    public function showFiltrado($id){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $categorias = $this->model->getAllName($id);
        $autos = $this->model->getAllAutosByCategoryId($id);
        $this->view->showListFiltrado($categorias, $autos);
    }

    /**CRUD de la tabla categorias*/
    public function addCategorias(){
        $this->helper->checkLogged();

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];

            $this->model->add($nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        } else{
            $this->view->showError("Complete todos los campos");
        }
    }

    public function deleteCategorias($id){
        $this->helper->checkLogged();

        if(!isset($_POST['id']) && empty($_POST['id'])){
            $this->view->showError("Tiene que eliminar los autos que pertenecen a esta categoria primero");
        }

        $this->model->delete($id);

        header("Location: " . BASE_URL);
    }

    public function showFormCat($id){
        $categorias = $this->model->getAllForEdit($id);
        $this->view->showFormEditCat($id,$categorias);
    }

    public function updateCategorias($id){
        $this->helper->checkLogged();
        
        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            
            $this->model->update($id, $nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        }
    }
}