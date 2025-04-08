<?php
require_once 'instances.php';
require_once 'libs/Router.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . rtrim(dirname($_SERVER['PHP_SELF']), '/').'/');

$router = new Router();

$action = 'home';
if(isset($_GET['action'])) {
    $action = $_GET['action'];
} 

$router->setDefaultRoute($autosController, 'showHome');

$router->addRoute('politicas', $userController, 'showPrivacidad');

$router->addRoute('contacto', $userController, 'showContacto');

$router->addRoute('registrarse', $userController, 'createUser');

$router->addRoute('cuenta', $userController, 'showFormRegistrarse');

$router->addRoute('login', $userController, 'showFormLogin');

$router->addRoute('validar', $userController, 'validateUser');

$router->addRoute('logout', $userController, 'logout');

$router->addRoute('autos/detalle/:ID', $autosController, 'showDetalle');

$router->addRoute('autos/insertar', $autosController, 'addAutos');

$router->addRoute('autos/eliminar/:ID', $autosController, 'deleteAutos');

$router->addRoute('autos/edit/:ID', $autosController, 'showFormAutos');

$router->addRoute('autos/update/:ID', $autosController, 'updateAutos');

$router->addRoute('categorias/insertar', $categoriasController, 'addCategorias');

$router->addRoute('categorias/eliminar/:ID', $categoriasController, 'deleteCategorias');

$router->addRoute('categorias/edit/:ID', $categoriasController, 'showFormCat');

$router->addRoute('categorias/update/:ID', $categoriasController, 'updateCategorias');

$router->addRoute('categorias/autos/:ID', $categoriasController, 'showFiltrado');

$router->route($action);


