<?php

declare(strict_types=1);

require_once __DIR__ . '/../../middlewares/AuthHelper.php';

class SiteController {
    private CarModel $carModel;
    private CategoryModel $categoryModel;
    private SiteView $siteView;

    public function __construct(CarModel $carModel, CategoryModel $categoryModel, SiteView $siteView) {
        $this->carModel = $carModel;
        $this->categoryModel = $categoryModel;
        $this->siteView = $siteView;
    }

    public function createHome(): void {
        $cars = AuthHelper::isLogged() ? $this->carModel->getAllWithCategoryNameByUserId(AuthHelper::getUserId()) : $this->carModel->getAllWithCategoryName();
        $categories = AuthHelper::isLogged() ? $this->categoryModel->getAllByUserId(AuthHelper::getUserId()) : $this->categoryModel->getAll();

        $this->siteView->showHome($cars, $categories);
    }

    public function getPrivacityPolicy(): void {
        $this->siteView->showPoliticiesPrivacity();
    }

    public function getContact(): void {
        $this->siteView->showContact();
    }
}