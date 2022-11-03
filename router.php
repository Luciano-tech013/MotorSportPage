<?php 
require_once 'app/Controllers/AutosController.php';
require_once 'app/Controllers/CategoriasController.php'; 
require_once 'app/Controllers/UserController.php';       

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} 

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $AutosController = new AutosController();
        $AutosController->showHome();
        break;
    /**Detalle y filtrado */
    case 'detalle':
        $id = $params[1];
        $AutosController = new AutosController();
        $AutosController->showDetalle($id);
        break;
    case 'filtrar':
        $id = $params[1];
        $CategoriasController = new CategoriasController();
        $CategoriasController->showFiltrado($id);
        break;
    /**Llamados a la NavBar */
    case 'PoliticayPrivacidad':
        $UserController = new UserController();
        $UserController->showPrivacidad();
        break;
    case 'contacto':
        $UserController = new UserController();
        $UserController->showContacto();
        break;
    /**Llamados a registrarse y login*/
    case 'registrarse':
        $UserController = new UserController();
        $UserController->showFormRegistrarse();
        break;
    case 'cuenta':
        $UserController = new UserController();
        $UserController->createUser();
        break;
    case 'login':
        $UserController = new UserController();
        $UserController->showFormLogin();
        break;
    case 'validar':
        $UserController = new UserController();
        $UserController->validateUser();
        break;
    case 'logout':
        $UserController = new UserController();
        $UserController->logout();
        break;
    /**CRUD */
    case 'addItems':
        $AutosController = new AutosController();
        $AutosController->addItems();
        break;
    case 'deleteItems':
        $id = $params[1];
        $AutosController = new AutosController();
        $AutosController->deleteItems($id);
        break;
    case 'editItems':
        $id = $params[1];
        $AutosController = new AutosController();
        $AutosController->showFormItems($id);
        break;
    case 'updateItems':
        $id = $params[1];
        $AutosController = new AutosController();
        $AutosController->updateItem($id);
        break;
    case 'addCategorias':
        $CategoriasController = new CategoriasController();
        $CategoriasController->addCategorias();
        break;
    case 'deleteCategorias':
        $id = $params[1];
        $CategoriasController = new CategoriasController();
        $CategoriasController->deleteCategorias($id);
        break;
    case 'editCat':
        $id = $params[1];
        $CategoriasController = new CategoriasController();
        $CategoriasController->showFormCat($id);
        break;
    case 'updateCategorias':
        $id = $params[1];
        $CategoriasController = new CategoriasController();
        $CategoriasController->updateCategorias($id);
    default:
        echo('404 Page not found');
        break;
}