<?php
require_once 'app/Models/usuariosModel.php';
require_once 'app/Models/autosModel.php';
require_once 'app/Models/categoriasModel.php';
require_once 'app/Views/tablesView.php';

class AdminController {

    private $autosModel;
    private $categoriasModel;
    private $view;

    function __construct(){
        $this->autosModel = new autosModel();
        $this->categoriasModel = new categoriasModel();
        $this->view = new tablesViewAdmin();
    }

    function showHome(){
        $autos_db = $this->autosModel->getAllAutos();
        $categorias_db = $this->categoriasModel->getAllCategorias();
        $this->view->showTable($autos_db, $categorias_db);
    }

    function showContacto(){
        $this->view->showContacto();
    }

    /**CRUD de la tabla autoss*/
    function addItems(){
        if(!empty($_POST['nombre'] && $_POST['descripcion'] && $_POST['modelo'] && $_POST['marca'] && $_POST['categoria'])){
            $this->view->showError("Debe completar los datos solicitados!!");
        }
        if($_FILES['imagen']['jpg'] == "image/jpg" || $_FILES['imagen']['jpeg'] == "image/jpeg" || $_FILES['imagen']['png'] == "image/png"){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            $id_categoria = $_POST['categoria'];

            $this->autosModel->addAuto($nombre, $descripcion, $modelo, $marca, $imagen, $id_categoria);
            $this->view->showTable();

            header("Location: " . BASE_URL);
        }
    }

    function deleteItems($id){
        if(!isset($_POST['id']) && empty($_POST['id'])){
            $this->view->showError("Error: No se puede eliminar");
        }

        $this->autosModel->deleteAuto($id);

        header("Location: " . BASE_URL);
    }

    function update($id){
        $this->view->showFormEdit();
    }

    function updateItem($id){
        if(!empty($_POST['nombre'] && $_POST['id'] && $_POST['descripcion'] && $_POST['modelo'] && $_POST['marca'] && $_POST['categoria'])){
            $this->view->showError("Error: No se puede actualizar");
        }

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $id_categoria = $_POST['categoria'];
        
        $this->autoModel->updateAuto($id, $nombre, $descripcion, $modelo, $marca, $id_categoria);

        header("Location: " . BASE_URL);
    }


    /**CRUD de la tabla categorias*/

}