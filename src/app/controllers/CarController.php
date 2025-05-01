<?php

declare(strict_types=1);

require_once __DIR__ . '/../../middlewares/AuthHelper.php';

class CarController {

    private CarModel $carModel;
    private CategoryModel $categoryModel;
    private SiteView $siteView;
    private FormView $formView;
    private FormValidator $formValidator;
    private ExistenceValidator $existenceValidator;
    private UniqueNameValidator $uniqueNameValidator;

    public function __construct(CarModel $carModel, CategoryModel $categoryModel, SiteView $siteView, FormView $formView, FormValidator $formValidator, ExistenceValidator $existenceValidator, UniqueNameValidator $uniqueNameValidator) {
        $this->carModel = $carModel;
        $this->categoryModel = $categoryModel;
        $this->siteView = $siteView;
        $this->formView = $formView;
        $this->formValidator = $formValidator;
        $this->existenceValidator = $existenceValidator;
        $this->uniqueNameValidator = $uniqueNameValidator;
    }

    public function getCarDetail(string $id): void {
        $this->existenceValidator->validateExistence($this->carModel, $id);
        
        $detail = $this->carModel->getByIdWithDescription($id);
        $this->siteView->showDetail($detail, "Detalle del auto: ");
    }

    public function addCar(): void {
        AuthHelper::checkLoggedAndRedict();

        $fields = $this->getFields();

        $errors = $this->formValidator->validateFields($fields);
        if(!empty($errors)) {
            FlashErrorsHelper::mapFieldErrors($errors);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            return;
        }

        $name = $_POST['name'];
        $nameId = strtolower($name);
        $userId = AuthHelper::getUserId();

        $isUnique = $this->uniqueNameValidator->isAUniqueName($this->carModel, $nameId, $userId);
        if(!$isUnique) {
            FlashErrorsHelper::addError("UNIQUE_NAME_CAR", "El nombre del auto ya existe.");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            return;
        }
        
        FlashErrorsHelper::clearErrors();

        $this->carModel->add(
            $fields["carName"], 
            $nameId, 
            $fields["carDescription"], 
            $fields["model"], 
            $fields["brand"], 
            $fields["category"]
        );

        header("Location: " . BASE_URL);
    }

    public function deleteCar(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        $this->existenceValidator->validateExistence($this->carModel, $id);

        $this->carModel->delete($id);

        header("Location: " . BASE_URL);
    }

    public function getCarForm(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        $this->existenceValidator->validateExistence($this->carModel, $id);

        $route = 'update/car/' . $id;

        $categories = $this->categoryModel->getAllWithIdAndName(AuthHelper::getUserId());
        $car = $this->carModel->getById($id);

        $this->formView->showCarFormEdit('car.form.tpl', $car, $categories, $route);
    }

    public function updateCar(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        $this->existenceValidator->validateExistence($this->carModel, $id);

        $fields = $this->getFields();

        $errors = $this->formValidator->validateFields($fields);
        if(!empty($errors)) {
            FlashErrorsHelper::mapFieldErrors($errors);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            return;
        }

        FlashErrorsHelper::clearErrors();

        $this->carModel->update(
            $id, 
            $fields["carName"],
            strtolower($fields["carName"]), 
            $fields["carDescription"], 
            $fields["model"], 
            $fields["brand"], 
            $fields["category"]
        );

        header("Location: " . BASE_URL);
    }

    private function getFields(): array {
        return [
            'carName' => $_POST['name'],
            'carDescription' => $_POST['description'],
            'model' => $_POST['model'],
            'brand' => $_POST['brand'],
            'category' => $_POST['category_id']
        ];
    }
}
