<?php
require_once 'app/Models/usuariosModel.php';
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/CategoriasView.php';
require_once 'app/Views/userView.php';
require_once 'app/helpers/AuthHelper.php';

class CategoriasController {

    private $categoriasModel;
    private $userView;
    private $CategoriasView;
    private $helper;

    public function __construct(){
        $this->categoriasModel = new categoriasModel();
        $this->userView = new userView();
        $this->CategoriasView = new CategoriasView();
        $this->helper = new AuthHelper();
    }

    public function showHome(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $categorias_db = $this->categoriasModel->getAll();
        $this->CategoriasView->showTable($categorias_db);
    }

    public function showFiltrado($id){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $categorias = $this->categoriasModel->getAllName($id);
        $autos = $this->categoriasModel->getAllAutosByCategoryId($id);
        $this->CategoriasView->showListFiltrado($categorias, $autos);
    }

    /**CRUD de la tabla categorias*/
    public function addCategorias(){
        $this->helper->checkLogged();

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];

            $this->categoriasModel->add($nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        } else{
            $this->CategoriasView->showError("Complete todos los campos");
        }
    }

    public function deleteCategorias($id){
        $this->helper->checkLogged();

        if(!isset($_POST['id']) && empty($_POST['id'])){
            $this->CategoriasView->showError("Error: No se puede eliminar");
        }

        $this->categoriasModel->delete($id);

        header("Location: " . BASE_URL);
    }

    public function showFormCat($id){
        $categorias = $this->categoriasModel->getAllForEdit($id);
        $this->CategoriasView->showFormEdit($id,$categorias);
    }

    public function updateCategorias($id){
        $this->helper->checkLogged();
        
        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            
            $this->categoriasModel->update($id, $nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        }
    }
}