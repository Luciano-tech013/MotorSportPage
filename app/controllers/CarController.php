<?php
require_once __DIR__ . '/../../utils/validators/ValidatorFields.php';

class CarController {

    private static CarController $instance;
    private CarModel $carModel;
    private CategoryModel $categoryModel;
    private SiteView $siteView;
    private FormView $formView;
    private AuthHelper $authHelper;

    private function __construct(CarModel $carModel, CategoryModel $categoryModel, SiteView $siteView, FormView $formView, AuthHelper $authHelper) {
        $this->carModel = $carModel;
        $this->categoryModel = $categoryModel;
        $this->siteView = $siteView;
        $this->formView = $formView;
        $this->authHelper = $authHelper;
    }

    public static function getInstance(CarModel $carModel, CategoryModel $categoryModel, SiteView $siteView, FormView $formView, AuthHelper $authHelper): CarController {
        if (!isset(self::$instance)) {
            self::$instance = new CarController($carModel, $categoryModel, $siteView, $formView, $authHelper);
        }

        return self::$instance;
    }

    public function getCarDetail(array $params): Void {
        $id = $params[":ID"];

        //Validate id
        $this->validateExisting($id);

        $detail = $this->carModel->getByIdWithDescription($id);
        $this->siteView->showDetail($detail);
    }

    public function addCar(): Void {
        $this->authHelper->checkLoggedAndRedict();

        //Validate fields
        $this->validateFieldsAdd();

        //Validate repeated name
        $name = $_POST['name'];
        $nameId = strtolower($name);
        $this->validateRepeatedNameAdd($nameId);

        $description = $_POST['description'];
        $model = $_POST['model'];
        $brand = $_POST['brand'];
        $category = $_POST['category_id'];
     
        $this->carModel->add($name, $nameId, $description, $model, $brand, $category);

        header("Location: " . BASE_URL);
    }

    public function deleteCar(Array $params): Void {
        $this->authHelper->checkLoggedAndRedict();

        $id = $params[":ID"];

        //Validate id
        $this->validateExisting($id);

        $this->carModel->delete($id);

        header("Location: " . BASE_URL);
    }

    public function getCarForm(Array $params): Void {
        $this->authHelper->checkLoggedAndRedict();

        $id = $params[":ID"];
        //Validate id
        $this->validateExisting($id);

        $route = 'update/car/' . $id;

        $categories = $this->categoryModel->getAllByIdUser($this->authHelper->getUserId());
        $car = $this->carModel->getById($id);

        $this->formView->showCarFormEdit('car.form.tpl', $car, $categories, $route);
    }

    public function updateCar(Array $params): Void {
        $id = $params[":ID"];

        $this->authHelper->checkLoggedAndRedict();

        //Validate id
        $this->validateExisting($id);

        //Validate fields
        $this->validateFieldsUpdate($id);
        
        $name = $_POST['name'];
        $nameId = strtolower($name);
        $description = $_POST['description'];
        $model = $_POST['model'];
        $brand = $_POST['brand'];
        $category = $_POST['category_id'];

        $this->carModel->update($id, $name, $nameId, $description, $model, $brand, $category);

        header("Location: " . BASE_URL);
    }

    private function getFields(): Array {
        return [
            'carName' => $_POST['name'],
            'carDescription' => $_POST['description'],
            'model' => $_POST['model'],
            'brand' => $_POST['brand'],
            'category_id' => $_POST['category_id'] ?? null
        ];
    }

    private function validateFieldsAdd(): Void {
        $fields = $this->getFields();
        $errors = ValidatorFields::searchIncorrectFields($fields);
        if(!empty($errors)) {
            $userId = $this->authHelper->getUserId();
            $cars = $this->carModel->getAllByUserIdWithCategoryName($userId);
            $categories = $this->categoryModel->getAllByIdUser($userId);
            $this->siteView->showHome($cars, $categories, $errors);
            die();
        }
    }

    private function validateFieldsUpdate(String $id): Void {
        $route = 'update/car/' . $id;
        $fields = $this->getFields();
        $errors = ValidatorFields::searchIncorrectFields($fields);
        if (!empty($errors)) {
            $categories = $this->categoryModel->getAllByIdUser($this->authHelper->getUserId());
            $car = $this->carModel->getById($id);
            $this->formView->showCarFormEdit('car.form.tpl', $car, $categories, $route);
            die();
        }
    }

    private function validateExisting($id): Void {
        if(!$this->carModel->getById($id)) {
            header("Location: " . BASE_URL);
        }
    } 

    private function validateRepeatedNameAdd($nameId): Void {
        $errors = ["carRepeat" => true];
        if ($this->carModel->getByUserIdAndName($nameId, $this->authHelper->getUserId())) {
            $userId = $this->authHelper->getUserId();
            $cars = $this->carModel->getAllByUserIdWithCategoryName($userId);
            $categories = $this->categoryModel->getAllByIdUser($userId);
            $this->siteView->showHome($cars, $categories, $errors);
            die();
        }
    }

    private function validateRepeatedNameUpdate($nameId, $id): Void {
        $route = 'update/car/' . $id;
        $errors = ["carRepeat" => true];
        if ($this->carModel->getByUserIdAndName($nameId, $this->authHelper->getUserId())) {
            $categories = $this->categoryModel->getAllByIdUser($this->authHelper->getUserId());
            $car = $this->carModel->getById($id);
            $this->formView->showCarFormEdit('car.form.tpl', $car, $categories, $route);
            die();
        }
    }
}
