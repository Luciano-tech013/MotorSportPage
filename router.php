<?php
require_once './libs/Router.php';
require_once './database/connection/Connection.php';
require_once 'app/models/AutosModel.php';
require_once 'app/models/CategoriasModel.php';
require_once 'app/views/MotorView.php';
require_once 'app/views/UserView.php';
require_once 'app/helpers/AuthHelper.php';
require_once 'app/controllers/AutosController.php';
require_once 'app/controllers/CategoriasController.php'; 
require_once 'app/controllers/UserController.php';    

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} 

$params = explode('/', $action);

$connection = Connection::getInstance();
$smarty = new Smarty();

$autosModel = AutosModel::getInstance($connection);
$categoriasModel = CategoriasModel::getInstance($connection);

$motorView = MotorView::getInstance($smarty);
$userView = UserView::getInstance($smarty);

$authHelper = AuthHelper::getInstance();

$autosController = AutosController::getInstance($autosModel, $categoriasModel, $motorView, $userView, $authHelper);
$categoriasController = CategoriasController::getInstance($categoriasModel, $motorView, $userView, $authHelper);
$userController = UserController::getInstance($motorView, $userView, $authHelper);

$router = new Router();

$router->addRoute('politicas', 'GET', $userController, 'showPrivacidad');

$router->addRoute('contacto', 'GET', $userController, 'showContacto');

$router->addRoute('registrarse', 'GET', $userController, 'createUser');

$router->addRoute('cuenta', 'GET', $userController, 'showFormRegistrarse');

$router->addRoute('login', 'GET', $userController, 'showFormLogin');

$router->addRoute('validar', 'POST', $userController, 'validateUser');

$router->addRoute('logout', 'GET', $userController, 'logout');

$router->addRoute('autos/insertar', 'GET', $autosController, 'addAutos');

$router->addRoute('autos/eliminar/:ID', 'GET', $autosController, 'deleteAutos');

$router->addRoute('autos/edit/:ID', 'GET', $autosController, 'showFormAutos');

$router->addRoute('autos/update/:ID', 'POST', $autosController, 'updateAutos');

$router->addRoute('categorias/insertar', 'GET', $categoriasController, 'addCategorias');

$router->addRoute('categorias/eliminar/:ID', 'GET', $categoriasController, 'deleteCategorias');

$router->addRoute('categorias/edit/:ID', 'GET', $categoriasController, 'showFormCat');

$router->addRoute('categorias/update/:ID', 'POST', $categoriasController, 'updateCategorias');

$router->addRoute('categorias/autos/:ID', 'GET', $categoriasController, 'showFiltrado');

$router->setDefaultRoute('home', 'GET', $autosController, 'showHome');


/*match($params[0]) {
    'home' => AUTOS_CONTROLLER->showHome(),
    'politicas' => USER_CONTROLLER->showPrivacidad(),
    'contacto' => USER_CONTROLLER->showContacto(),
    'registrarse' => USER_CONTROLLER->createUser(),
    'cuenta' => USER_CONTROLLER->showFormRegistrarse(),
    'login' => USER_CONTROLLER->showFormLogin(),
    'validar' => USER_CONTROLLER->validateUser(),
    'logout' => USER_CONTROLLER->logout(),
    'autos' => ,
    'categorias' => match($params[1]) {
        'insertar' => CATEGORIAS_CONTROLLER->addCategorias(),
        'eliminar' => CATEGORIAS_CONTROLLER->deleteCategorias($params[2]),
        'edit' => CATEGORIAS_CONTROLLER->showFormCat($params[2]),
        'update' => CATEGORIAS_CONTROLLER->updateCategorias($params[2]),
        'autos' => CATEGORIAS_CONTROLLER->showFiltrado($params[2]),
        default => USER_CONTROLLER->showResourcesNotFound()
    },
    default => USER_CONTROLLER->showResourcesNotFound()
};*/
