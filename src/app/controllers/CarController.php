<?php

declare(strict_types=1);

require_once __DIR__ . '/../../middlewares/AuthHelper.php';

class CarController {

    private CarModel $carModel;
    private CategoryModel $categoryModel;
    private SiteView $siteView;
    private FormView $formView;
    private FormValidator $formValidator;
    private UniqueNameValidator $uniqueNameValidator;

    public function __construct(CarModel $carModel, CategoryModel $categoryModel, SiteView $siteView, FormView $formView, FormValidator $formValidator, UniqueNameValidator $uniqueNameValidator) {
        $this->carModel = $carModel;
        $this->categoryModel = $categoryModel;
        $this->siteView = $siteView;
        $this->formView = $formView;
        $this->formValidator = $formValidator;
        $this->uniqueNameValidator = $uniqueNameValidator;
    }

    public function getCarDetail(string $id): void {
        if(!$this->carModel->getById($id)) {
            header("Location: " . BASE_URL);
            return;
        }
        
        $detail = AuthHelper::isLogged() ? $this->carModel->getByIdAndUserIdWithDescription($id, AuthHelper::getUserId()) : $this->carModel->getByIdWithDescription($id); 
        if(empty($detail)) {
            header("Location: " . BASE_URL);
            return;
        }

        $this->siteView->showDetail($detail, "Detalle del auto: ");
    }

    public function addCar(): void {
        AuthHelper::checkLoggedAndRedict();

        $fields = $this->getFields();
        if(empty($fields)) {
            header("Location: " . BASE_URL);
            return;
        }

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

        if(!$this->carModel->getByIdAndUserId($id, AuthHelper::getUserId())) {
            header("Location: " . BASE_URL);
            return;
        }

        //Se intento eliminar una categoria con autos asociados y ya se informó
        FlashErrorsHelper::clearErrors();
        
        $this->carModel->deleteByIdAndUserId($id, AuthHelper::getUserId());

        header("Location: " . BASE_URL);
    }

    public function getCarForm(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        $car = $this->carModel->getByIdAndUserId($id, AuthHelper::getUserId());
        if(!$car) {
            header("Location: " . BASE_URL);
            return;
        }

        $categories = $this->categoryModel->getAllWithIdAndName(AuthHelper::getUserId());

        $route = 'update/car/' . $id;

        $this->formView->showCarFormEdit('car.form.tpl', $car, $categories, $route);
    }

    public function updateCar(string $id): void {
        AuthHelper::checkLoggedAndRedict();

        if(!$this->carModel->getByIdAndUserId($id, AuthHelper::getUserId())) {
            header("Location: " . BASE_URL);
            return;
        }
        
        $fields = $this->getFields();
        if(empty($fields)) {
            header("Location: " . BASE_URL);
            return;
        }

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
        //Valido que los datos hayan venido del envío del formulario 
        if(!isset($_POST['name']) || 
           !isset($_POST['description']) || 
           !isset($_POST['model']) || 
           !isset($_POST['brand']) || 
           !isset($_POST['category_id'])) {
            return [];
        }

        return [
            'carName' => $_POST['name'],
            'carDescription' => $_POST['description'],
            'model' => $_POST['model'],
            'brand' => $_POST['brand'],
            'category' => $_POST['category_id']
        ];
    }
}
