<?php
require_once 'app/Models/usuariosModel.php';
require_once 'app/Models/autosModel.php';
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/MainView.php';
require_once 'app/Views/userView.php';
require_once 'app/helpers/AuthHelper.php';

class PageAdminController {

    private $autosModel;
    private $categoriasModel;
    private $userView;
    private $MainView;
    private $helper;

    function __construct(){
        $this->autosModel = new autosModel();
        $this->categoriasModel = new categoriasModel();
        $this->userView = new userView();
        $this->MainView = new MainView();
        $this->helper = new AuthHelper();
    }

     /**CRUD de la tabla autoss*/
    function addItems(){
        /**session_start();
        $this->helper->checkLogged();*/

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['modelo'] && $_POST['marca'] && $_POST['categoria'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $id_categoria = $_POST['categoria'];

            $this->autosModel->addAuto($nombre, $descripcion, $modelo, $marca, $id_categoria);
            
            header("Location: " . BASE_URL);
        } else {
            $this->MainView->showError("Debe completar los datos solicitados!!");
        }
    }

    function deleteItems($id){
        session_start();
        $this->helper->checkLogged();

        if(!isset($_POST['id']) && empty($_POST['id'])){
            $this->view->showError("Error: No se puede eliminar");
        }

        $this->autosModel->deleteAuto($id);

        header("Location: " . BASE_URL);
    }

    function showFormItems($id){
        $autos = $this->autosModel->getAllAutosForEdit($id);
        $categorias = $this->categoriasModel->getAllCategorias();
        $this->userView->showFormEditAutos($id, $autos, $categorias);
    }

    function updateItem($id){
        /**session_start();
        $this->helper->checkLogged();*/

        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['modelo']) && isset($_POST['marca']) && isset($_POST['categoria'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $id_categoria = $_POST['categoria'];
        
            $this->autosModel->updateAuto($id, $nombre, $descripcion, $modelo, $marca, $id_categoria);

            header("Location: " . BASE_URL);
        } 
    }


    /**CRUD de la tabla categorias*/
    function addCategorias(){
        /**session_start();
        $this->helper->checkLogged();*/

        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];

            $this->categoriasModel->addCategoria($nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        } else{
            $this->MainView->showError("Complete todos los campos");
        }
    }

    function deleteCategorias($id){
        /**session_start();
        $this->helper->checkLogged();*/

        if(!isset($_POST['id']) && empty($_POST['id'])){
            $this->view->showError("Error: No se puede eliminar");
        }

        $this->categoriasModel->deleteCategoria($id);

        header("Location: " . BASE_URL);
    }

    function showFormCat($id){
        $categorias = $this->categoriasModel->getAllCategoriasForEdit($id);
        $this->userView->showFormEditCategorias($id,$categorias);
    }

    function updateCategorias($id){
        /**session_start();
        $this->helper->checkLogged();*/
        
        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            
            $this->categoriasModel->updateCategoria($id, $nombre, $descripcion, $tipo);

            header("Location: " . BASE_URL);
        }
    }
}