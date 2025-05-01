<?php

declare(strict_types=1);

require_once __DIR__ . '/../../middlewares/AuthHelper.php';
require_once __DIR__ . '/../../middlewares/FlashErrorsHelper.php';

class CategoryController {

    private CategoryModel $categoryModel;
    private CarModel $carModel;
    private SiteView $siteView;
    private FormView $formView;
    private CategoryDeletionValidator $categoryDeletionValidator;
    private FormValidator $formValidator;
    private ExistenceValidator $existenceValidator;
    private UniqueNameValidator $uniqueNameValidator;

    public function __construct(CategoryModel $categoryModel, CarModel $carModel, SiteView $siteView, FormView $formView, CategoryDeletionValidator $categoryDeletionValidator, FormValidator $formValidator, ExistenceValidator $existenceValidator, UniqueNameValidator $uniqueNameValidator){
        $this->categoryModel = $categoryModel;
        $this->carModel = $carModel;
        $this->siteView = $siteView;
        $this->formView = $formView;
        $this->categoryDeletionValidator = $categoryDeletionValidator;
        $this->formValidator = $formValidator;
        $this->existenceValidator = $existenceValidator;
        $this->uniqueNameValidator = $uniqueNameValidator;
    }

    public function getCategoryDetail(string $id): void {
        $this->existenceValidator->validateExistence($this->categoryModel, $id);

        $category = $this->categoryModel->getByIdWithDescription($id);
        $this->siteView->showDetail($category, "Detalle de la categoria: ");
    }

    public function getFilterListOfCategory(string $id): void {
        $this->existenceValidator->validateExistence($this->categoryModel, $id);

        $categoryName = $this->categoryModel->getByIdWithName($id);
        $cars = $this->carModel->getAllByCategoryIdWithNameAndBrand($id);

        $this->siteView->showCategoryFilterList($categoryName, $cars);
    }

    public function addCategory(): void {
        AuthHelper::checkLoggedAndRedict();

        $fields = $this->getFields();

        $errors = $this->formValidator->validateFields($fields);
        if(!empty($errors)) {
            FlashErrorsHelper::mapFieldErrors($errors);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            return;
        }

        FlashErrorsHelper::clearErrors();

        $name = $_POST['name'];
        $nameId = strtolower($name);
        $userId = AuthHelper::getUserId();

        $isUnique = $this->uniqueNameValidator->isAUniqueName($this->carModel, $nameId, $userId);
        if(!$isUnique) {
            FlashErrorsHelper::addError("UNIQUE_NAME_CATEGORY", "El nombre de la categoria ya existe.");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            return;
        }

        $this->categoryModel->add(
            $name, 
            $nameId, 
            $fields["categoryDescription"], 
            $fields["type"],
            $userId
        );

        header("Location: " . BASE_URL);
    }

    public function deleteCategory(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        $this->existenceValidator->validateExistence($this->categoryModel, $id);

        try {
            $this->categoryDeletionValidator->isDeletable($id);
        } catch(CategoryDeletionException $e) {
            FlashErrorsHelper::addError("INVALID_DELETABLE", $e->getMessage());
            header("Location: " . $_SERVER['HTTP_REFERER']);
            return;
        }
        
        FlashErrorsHelper::clearErrors();
    
        $this->categoryModel->delete($id);
        
        header("Location: " . BASE_URL);
    }

    public function getCategoryForm(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        $this->existenceValidator->validateExistence($this->categoryModel, $id);

        $route = "update/category/" . $id;

        $category = $this->categoryModel->getById($id);

        $this->formView->showCategoryFormEdit('category.form.tpl', $category, $route);
    }

    public function updateCategory(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        $this->existenceValidator->validateExistence($this->categoryModel, $id);
        
        $fields = $this->getFields();

        $errors = $this->formValidator->validateFields($fields);
        if(!empty($errors)) {
            FlashErrorsHelper::mapFieldErrors($errors);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            return;
        }

        FlashErrorsHelper::clearErrors();
    
        $this->categoryModel->update(
            $id, 
            $fields["categoryName"],
            strtolower($fields["categoryName"]), 
            $fields["categoryDescription"], 
            $fields["type"]
        );

        header("Location: " . BASE_URL);
    }

    private function getFields(): array 
    {
        return [
            "categoryName" => $_POST["name"],
            "categoryDescription" => $_POST["description"],
            "type" => $_POST["type"]
        ];
    }
}