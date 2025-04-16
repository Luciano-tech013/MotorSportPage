<?php

class SiteController {
    private static SiteController $instance;
    private CarModel $carModel;
    private CategoryModel $categoryModel;
    private AuthHelper $authHelper;
    private SiteView $siteView;

    private function __construct(CarModel $carModel, CategoryModel $categoryModel, AuthHelper $authHelper, SiteView $siteView) {
        $this->carModel = $carModel;
        $this->categoryModel = $categoryModel;
        $this->authHelper = $authHelper;
        $this->siteView = $siteView;
    }

    public static function getInstance(CarModel $carModel, CategoryModel $categoryModel, AuthHelper $authHelper, SiteView $siteView): SiteController {
        if(!isset(self::$instance))
            self::$instance = new SiteController($carModel, $categoryModel, $authHelper, $siteView);

        return self::$instance;
    }

    public function createHome($errors): Void {
        $userId = $this->authHelper->getUserId();

        $cars = [];
        $categories = [];
        if ($this->authHelper->isLogged()) {
            $cars = $this->carModel->getAllByUserIdWithCategoryName($userId);
            $categories = $this->categoryModel->getAllByIdUser($userId);
        } else {
            $cars = $this->carModel->getAllWithCategoryName();
            $categories = $this->categoryModel->getAll();
        }

        $this->siteView->showHome($cars, $categories, $errors);
    }

    public function getPrivacityPolicy(): Void {
        $this->siteView->showPoliticiesPrivacity();
    }

    public function getContact(): Void {
        $this->siteView->showContact();
    }
}