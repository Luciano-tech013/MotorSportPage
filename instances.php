<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
require_once 'database/connection/Connection.php';
require_once 'app/models/CarModel.php';
require_once 'app/models/CategoryModel.php';
require_once 'app/models/UserModel.php';
require_once 'app/views/SiteView.php';
require_once 'app/views/FormView.php';
require_once 'middlewares/AuthHelper.php';
require_once 'app/controllers/CarController.php';
require_once 'app/controllers/CategoryController.php'; 
require_once 'app/controllers/UserController.php'; 
require_once 'app/controllers/SiteController.php';
require_once 'app/controllers/AuthController.php';

$connection = Connection::getInstance();
$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/app/views/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');

$siteView = SiteView::getInstance($smarty);
$formView = FormView::getInstance($smarty);

try {
    $carModel = CarModel::getInstance($connection);
    $categoryModel = CategoryModel::getInstance($connection);
    $userModel = UserModel::getInstance($connection);
} catch(PDOException $e) {
    $siteView->showErrorSever();
    die();
}

$authHelper = AuthHelper::getInstance();

$siteController = SiteController::getInstance($carModel, $categoryModel, $authHelper, $siteView);
$carController = CarController::getInstance($carModel, $categoryModel, $siteView, $formView, $authHelper);
$categoryController = CategoryController::getInstance($categoryModel, $carModel, $siteView, $authHelper, $formView);
$userController = UserController::getInstance($userModel, $formView, $authHelper);
$authController = AuthController::getInstance($userModel, $authHelper, $formView);