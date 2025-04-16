<?php
require_once 'instances.php';
require_once 'libs/Router.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . rtrim(dirname($_SERVER['PHP_SELF']), '/').'/');

$router = new Router();

$action = 'home';
if(isset($_GET['action'])) {
    $action = $_GET['action'];
} 

$router->setDefaultRoute($siteController, 'createHome');

$router->addRoute('politicies', $siteController, 'getPrivacityPolicy');

$router->addRoute('contact', $siteController, 'getContact');

$router->addRoute('signup', $userController, 'createUser');

$router->addRoute('account', $userController, 'getSignUpForm');

$router->addRoute('account/validate', $userController, 'getSignInForm');

$router->addRoute('login', $authController, 'login');

$router->addRoute('account/logout', $authController, 'logout');

$router->addRoute('car/detail/:ID', $carController, 'getCarDetail');

$router->addRoute('save/car', $carController, 'addCar');

$router->addRoute('remove/car/:ID', $carController, 'deleteCar');

$router->addRoute('edit/car/:ID', $carController, 'getCarForm');

$router->addRoute('update/car/:ID', $carController, 'updateCar');

$router->addRoute('save/category', $categoryController, 'addCategory');

$router->addRoute('remove/category/:ID', $categoryController, 'deleteCategory');

$router->addRoute('edit/category/:ID', $categoryController, 'getCategoryForm');

$router->addRoute('update/category/:ID', $categoryController, 'updateCategory');

$router->addRoute('category/cars/:ID', $categoryController, 'getFilterListOfCategory');

$router->route($action);


