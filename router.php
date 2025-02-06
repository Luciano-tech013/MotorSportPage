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
        'detalle' => AUTOS_CONTROLLER->showDetalle($params[2]),
        default => USER_CONTROLLER->showResourcesNotFound()
    },
    'categorias' => match($params[1]) {
        'insertar' => CATEGORIAS_CONTROLLER->addCategorias(),
        'eliminar' => CATEGORIAS_CONTROLLER->deleteCategorias($params[2]),
        'edit' => CATEGORIAS_CONTROLLER->showFormCat($params[2]),
        'update' => CATEGORIAS_CONTROLLER->updateCategorias($params[2]),
        'autos' => CATEGORIAS_CONTROLLER->showFiltrado($params[2]),
        default => USER_CONTROLLER->showResourcesNotFound()
    },
    default => USER_CONTROLLER->showResourcesNotFound()
};
