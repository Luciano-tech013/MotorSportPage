<?php require_once 'app/Controllers/PageController.php';
      require_once 'app/Controllers/PageAdminController.php'; 
      require_once 'app/Controllers/AuthController.php';       
?>
<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} 

$params = explode('/', $action);

switch ($params[0]) {
    /**Llamados al Home */
    case 'home':
        $PageController = new PageController();
        $PageController->showHome();
        break;
    /**Detalle y filtrado */
    case 'detalle':
        $id = $params[1];
        $PageController = new PageController();
        $PageController->showDetalle($id);
        break;
    case 'filtrar':
        $id = $params[1];
        $PageController = new PageController();
        $PageController->showFiltrado($id);
        break;
    /**Llamados a la NavBar */
    case 'PoliticayPrivacidad':
        $PageController = new PageController();
        $PageController->showPrivacidad();
        break;
    case 'contacto':
        $PageController = new PageController();
        $PageController->showContacto();
        break;
    /**Llamados al crear cuenta */
    case 'registrarse':
        $PageController = new PageController();
        $PageController->showCrearCuenta();
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
    case 'logout':
        $AuthController = new AuthController();
        $AuthController->logout();
        break;
    /**CRUD */
    case 'addItems':
        $PageAdminController = new PageAdminController();
        $PageAdminController->addItems();
        break;
    case 'deleteItems':
        $id = $params[1];
        $PageAdminController = new PageAdminController();
        $PageAdminController->deleteItems($id);
        break;
    case 'editItems':
        $id = $params[1];
        $PageAdminController = new PageAdminController();
        $PageAdminController->showFormItems($id);
        break;
    case 'updateItems':
        $id = $params[1];
        $PageAdminController = new PageAdminController();
        $PageAdminController->updateItem($id);
        break;
    case 'addCategorias':
        $PageAdminController = new PageAdminController();
        $PageAdminController->addCategorias();
        break;
    case 'deleteCategorias':
        $id = $params[1];
        $PageAdminController = new PageAdminController();
        $PageAdminController->deleteCategorias($id);
        break;
    case 'editCat':
        $id = $params[1];
        $PageAdminController = new PageAdminController();
        $PageAdminController->showFormCat($id);
        break;
    case 'updateCategorias':
        $id = $params[1];
        $PageAdminController = new PageAdminController();
        $PageAdminController->updateCategorias($id);
    default:
        echo('404 Page not found');
        break;
}