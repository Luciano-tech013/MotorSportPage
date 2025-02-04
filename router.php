<?php 
require_once 'app/controllers/AutosController.php';
require_once 'app/controllers/CategoriasController.php'; 
require_once 'app/controllers/UserController.php';    

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} 

$params = explode('/', $action);

const AUTOS_CONTROLLER = new AutosController();
const CATEGORIAS_CONTROLLER = new CategoriasController();
const USER_CONTROLLER = new UserController();

/*switch ($params[0]) {
    case 'home':
        $AutosController = new AutosController();
        $AutosController->showHome();
        break;
    Llamados a la NavBar
    case 'politicas':
        $UserController = new UserController();
        $UserController->showPrivacidad();
        break;
    case 'contacto':
        $UserController = new UserController();
        $UserController->showContacto();
        break;
    Llamados a registrarse y login
    case 'registrarse':
        $UserController = new UserController();
        $UserController->createUser();
        break;
    case 'cuenta':
        $UserController = new UserController();
        $UserController->showFormRegistrarse();
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
    case 'autos':
        switch($params[1]) {
            case 'insertar':
                $AutosController = new AutosController();
                $AutosController->addItems();
                break;
            case 'eliminar':
                $id = $params[2];
                $AutosController = new AutosController();
                $AutosController->deleteItems($id);
                break;
            case 'edit':
                $id = $params[2];
                $AutosController = new AutosController();
                $AutosController->showFormItems($id);
                break;
            case 'update':
                $id = $params[2];
                $AutosController = new AutosController();
                $AutosController->updateItem($id);
                break;
            default:
                $id = $params[2];
                $AutosController = new AutosController();
                $AutosController->showDetalle($id);
                break;
        }
        break;
    case 'categorias':
        switch($params[1]) {
            case 'insetar':
                $CategoriasController = new CategoriasController();
                $CategoriasController->addCategorias();
                break;
            case 'eliminar':
                $id = $params[2];
                $CategoriasController = new CategoriasController();
                $CategoriasController->deleteCategorias($id);
                break;
            case 'edit':
                $id = $params[2];
                $CategoriasController = new CategoriasController();
                $CategoriasController->showFormCat($id);
                break;
            case 'update':
                $id = $params[2];
                $CategoriasController = new CategoriasController();
                $CategoriasController->updateCategorias($id);
                break;
            default:
                $id = $params[2];
                $CategoriasController = new CategoriasController();
                $CategoriasController->showFiltrado($id);
                break;
        }
        break;
    default:
        echo('404 Page not found');
        break;
}*/

match($params[0]) {
    'home' => AUTOS_CONTROLLER->showHome(),
    'politicas' => USER_CONTROLLER->showPrivacidad(),
    'contacto' => USER_CONTROLLER->showContacto(),
    'registrarse' => USER_CONTROLLER->createUser(),
    'cuenta' => USER_CONTROLLER->showFormRegistrarse(),
    'login' => USER_CONTROLLER->showFormLogin(),
    'validar' => USER_CONTROLLER->validateUser(),
    'logout' => USER_CONTROLLER->logout(),
    'autos' => match($params[1]) {
        'insertar' => AUTOS_CONTROLLER->addItems(),
        'eliminar' => AUTOS_CONTROLLER->deleteItems($params[2]),
        'edit' => AUTOS_CONTROLLER->showFormItems($params[2]),
        'update' => AUTOS_CONTROLLER->updateItem($params[2]),
        default => AUTOS_CONTROLLER->showDetalle($params[2]),
    },
    'categorias' => match($params[1]) {
        'insetar' => CATEGORIAS_CONTROLLER->addCategorias(),
        'eliminar' => CATEGORIAS_CONTROLLER->deleteCategorias($params[2]),
        'edit' => CATEGORIAS_CONTROLLER->showFormCat($params[2]),
        'update' => CATEGORIAS_CONTROLLER->updateCategorias($params[2]),
        default => CATEGORIAS_CONTROLLER->showFiltrado($params[2]),
    }
};
