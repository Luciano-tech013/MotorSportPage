<?php 
require_once 'app/Controllers/AutosController.php';
require_once 'app/Controllers/CategoriasController.php'; 
require_once 'app/Controllers/AuthController.php';       

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} 

$params = explode('/', $action);

switch ($params[0]) {
    /**Llamados al Home */
    case 'home':
        $AutosController = new AutosController();
        $CategoriasController = new CategoriasController();
        $AutosController->showHome();
        $CategoriasController->showHome();
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
        $AutosController = new AutosController();
        $AutosController->showPrivacidad();
        break;
    case 'contacto':
        $AutosController = new AutosController();
        $AutosController->showPrivacidad();
        break;
    /**Llamados a registrarse y login*/
    case 'registrarse':
        $AuthController = new AuthController();
        $AuthController->showFormRegistrarse();
        break;
    case 'cuenta':
        $AuthController = new AuthController();
        $AuthController->createUser();
        break;
    case 'login':
        $AuthController = new AuthController();
        $AuthController->showFormLogin();
        break;
    case 'validar':
        $AuthController = new AuthController();
        $AuthController->validateUser();
        break;
    case 'logout':
        $AuthController = new AuthController();
        $AuthController->logout();
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