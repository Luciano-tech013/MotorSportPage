<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
require_once 'database/connection/Connection.php';
require_once 'app/models/AutosModel.php';
require_once 'app/models/CategoriasModel.php';
require_once 'app/models/UsuariosModel.php';
require_once 'app/views/MotorView.php';
require_once 'app/views/UserView.php';
require_once 'middlewares/AuthHelper.php';
require_once 'app/controllers/AutosController.php';
require_once 'app/controllers/CategoriasController.php'; 
require_once 'app/controllers/UserController.php'; 

$connection = Connection::getInstance();
$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/app/views/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');

$autosModel = AutosModel::getInstance($connection);
$categoriasModel = CategoriasModel::getInstance($connection);
$usuariosModel = UsuariosModel::getInstance($connection);

$motorView = MotorView::getInstance($smarty);
$userView = UserView::getInstance($smarty);

$authHelper = AuthHelper::getInstance();

$autosController = AutosController::getInstance($autosModel, $categoriasModel, $motorView, $userView, $authHelper);
$categoriasController = CategoriasController::getInstance($categoriasModel, $motorView, $authHelper, $userView);
$userController = UserController::getInstance($usuariosModel, $userView, $authHelper);