<?php

declare(strict_types=1);

require_once __DIR__ . '/../database/connection/Connection.php';
require_once __DIR__ . '/../vendor/smarty/smarty/libs/Smarty.class.php';
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
require_once __DIR__ . '/../utils/validators/CategoryDeletionValidator.php';
require_once __DIR__ . '/../utils/validators/FormValidator.php';
require_once __DIR__ . '/../utils/validators/UniqueNameValidator.php';
require_once __DIR__ . '/../utils/rules/InvalidRulesProvider.php';
require_once __DIR__ . '/../utils/rules/InvalidRulesCarProvider.php';
require_once __DIR__ . '/../utils/rules/InvalidRulesCategoryProvider.php';
require_once __DIR__ . '/../utils/rules/InvalidRulesUserProvider.php';


class Instances {
    private PDO $connection;
    private Smarty $smarty;
    
    private function showError($error): void {
        $this->getSiteView()->showErrorSever($error);
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
        if(!empty($this->smarty))
            return $this->smarty;

        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/views/templates');
        $this->smarty->setCompileDir(__DIR__ . '/../templates_c');
        
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

    public function getUniqueNameValidator(): UniqueNameValidator {
        return new UniqueNameValidator();
    }

    public function getSiteController(): SiteController {
        return new SiteController(
            $this->getCarModel(),
            $this->getCategoryModel(),
            $this->getSiteView()
        );
    }

    public function getCarController(): CarController {
        return new CarController(
            $this->getCarModel(),
            $this->getCategoryModel(),
            $this->getSiteView(),
            $this->getFormView(),
            $this->getFormValidator(new InvalidRulesCarProvider()),
            $this->getUniqueNameValidator()
        );
    }

    public function getCategoryController(): CategoryController {
        return new CategoryController(
            $this->getCategoryModel(),
            $this->getCarModel(),
            $this->getSiteView(),
            $this->getFormView(),
            $this->getCategoryDeletionValidator(),
            $this->getFormValidator(new InvalidRulesCategoryProvider()),
            $this->getUniqueNameValidator()
        );
    }

    public function getUserController(): UserController {
        return new UserController(
            $this->getUserModel(),
            $this->getFormView(),
            $this->getFormValidator(new InvalidRulesUserProvider()),
            $this->getUniqueNameValidator()
        );
    }

    public function getAuthController(): AuthController {
        return new AuthController(
            $this->getUserModel()
        );
    }
}