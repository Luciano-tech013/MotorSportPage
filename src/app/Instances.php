<?php

declare(strict_types=1);

require_once '../src/database/connection/Connection.php';
require_once '../src/libs/smarty-4.2.1/libs/Smarty.class.php';
require_once 'models/CarModel.php';
require_once 'models/CategoryModel.php';
require_once 'models/UserModel.php';
require_once 'views/SiteView.php';
require_once 'views/FormView.php';
require_once 'controllers/CarController.php';
require_once 'controllers/CategoryController.php'; 
require_once 'controllers/UserController.php'; 
require_once 'controllers/SiteController.php';
require_once 'controllers/AuthController.php';
require_once '../src/utils/validators/CategoryDeletionValidator.php';
require_once '../src/utils/validators/FormValidator.php';
require_once '../src/utils/validators/ExistenceValidator.php';
require_once '../src/utils/validators/UniqueNameValidator.php';
require_once '../src/utils/rules/InvalidRulesProvider.php';
require_once '../src/utils/rules/InvalidRulesCarProvider.php';
require_once '../src/utils/rules/InvalidRulesCategoryProvider.php';
require_once '../src/utils/rules/InvalidRulesUserProvider.php';


class Instances {
    private ?PDO $connection = null;
    private ?Smarty $smarty = null;
    private ?SiteController $siteController = null;
    private ?CarController $carController = null;
    private ?CategoryController $categoryController = null;
    private ?UserController $userController = null;
    private ?AuthController $authController = null;

    private function showError($error): void {
        SiteView::showErrorSever($error->getMessage());
    }

    private function getPDO(): PDO {
        if(!empty($this->connection))
            return $this->connection;

        try {
            $this->connection = Connection::connect();
        } catch (PDOException $e) {
            $this->showError($e->getMessage());
            die();
        }

        return $this->connection;
    }

    private function getSmarty(): Smarty {
        if(empty($this->smarty)) {
            $this->smarty = new Smarty();
            $this->smarty->setTemplateDir(__DIR__ . '/views/templates');
            $this->smarty->setCompileDir(__DIR__ . '../templates_c');
        }
        
        return $this->smarty;
    }

    public function getSiteView(): SiteView {
        return new SiteView($this->getSmarty());
    }

    public function getFormView(): FormView {
        return new FormView($this->getSmarty());
    }

    public function getCarModel(): CarModel {
        return new CarModel($this->getPDO());
    }

    public function getCategoryModel(): CategoryModel {
        return new CategoryModel($this->getPDO());
    }

    public function getUserModel(): UserModel {
        return new UserModel($this->getPdo());
    }

    public function getCategoryDeletionValidator(): CategoryDeletionValidator {
        return new CategoryDeletionValidator($this->getCarModel());
    }

    public function getFormValidator(InvalidRulesProvider $rules): FormValidator {
        return new FormValidator($rules);
    }

    public function getExistenceValidator(): ExistenceValidator {
        return new ExistenceValidator();
    }

    public function getUniqueNameValidator(): UniqueNameValidator {
        return new UniqueNameValidator();
    }

    public function getSiteController(): SiteController {
        if(empty($this->siteController))
            $this->siteController = new SiteController(
                $this->getCarModel(), 
                $this->getCategoryModel(), 
                $this->getSiteView()
            );

        return $this->siteController;
    }

    public function getCarController(): CarController {
        if(empty($this->carController))
            $this->carController = new CarController(
                $this->getCarModel(),
                $this->getCategoryModel(),
                $this->getSiteView(),
                $this->getFormView(),
                $this->getFormValidator(new InvalidRulesCarProvider()),
                $this->getExistenceValidator(),
                $this->getUniqueNameValidator()
            );

        return $this->carController;
    }

    public function getCategoryController(): CategoryController {
        if(empty($this->categoryController))
            $this->categoryController = new CategoryController(
                $this->getCategoryModel(),
                $this->getCarModel(),
                $this->getSiteView(),
                $this->getFormView(),
                $this->getCategoryDeletionValidator(),
                $this->getFormValidator(new InvalidRulesCategoryProvider()),
                $this->getExistenceValidator(),
                $this->getUniqueNameValidator()
            );
        
        return $this->categoryController;
    }

    public function getUserController(): UserController {
        if(empty($this->userController))
            $this->userController = new UserController(
                $this->getUserModel(),
                $this->getFormView(),
                $this->getFormValidator(new InvalidRulesUserProvider()),
                $this->getExistenceValidator(),
                $this->getUniqueNameValidator()
            );

        return $this->userController;
    }

    public function getAuthController(): AuthController {
        if(empty($this->authController))
            $this->authController = new AuthController(
                $this->getUserModel()
            );

        return $this->authController;
    }
}