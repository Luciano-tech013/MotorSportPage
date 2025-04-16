<?php
require_once __DIR__ . '/../../utils/validators/ValidatorFields.php';

class CategoryController {

    private static CategoryController $instance;
    private CategoryModel $categoryModel;
    private CarModel $carModel;
    private SiteView $siteView;
    private AuthHelper $authHelper;
    private FormView $formView;

    private function __construct(CategoryModel $categoryModel, CarModel $carModel, SiteView $siteView, AuthHelper $authHelper, FormView $formView){
        $this->categoryModel = $categoryModel;
        $this->carModel = $carModel;
        $this->siteView = $siteView;
        $this->authHelper = $authHelper;
        $this->formView = $formView;
    }

    public static function getInstance(CategoryModel $categoryModel, CarModel $carModel, SiteView $siteView, AuthHelper $authHelper, FormView $formView): CategoryController {
        if(!isset(self::$instance)) {
            self::$instance = new CategoryController($categoryModel, $carModel, $siteView, $authHelper, $formView);
        }

        return self::$instance;
    }

    public function getFilterListOfCategory(Array $params): Void {
        $id = $params[":ID"];

        //Validate id
        $this->validateExisting($id);

        $categoryName = $this->categoryModel->getByIdWithName($id);
        $cars = $this->carModel->getAllByCategoryId($id);

        $this->siteView->showFilterList($categoryName, $cars);
    }

    public function addCategory(): Void {
        $this->authHelper->checkLoggedAndRedict();

        //Validate fields
        $this->validateFieldsAdd();

        $name = $_POST['name'];
        $nameId = strtolower($name);
        $userId = $this->authHelper->getUserId();
        $this->validateRepeatedNameAdd($nameId);

        $description = $_POST['description'];
        $type = $_POST['type'];

        $this->categoryModel->add($name, $nameId, $description, $type, $userId);

        header("Location: " . BASE_URL);
    }

    public function deleteCategory(Array $params): Void {
        $id = $params[":ID"];

        $this->authHelper->checkLoggedAndRedict();
        
        //Validate id
        $this->validateExisting($id);

        //Validate si tiene autos asociados
        $errors = ["cars" => true];
        if($this->carModel->getAllByCategoryId($id)) {
            header("Location: " . BASE_URL);
            die();
        }
        
        $this->categoryModel->delete($id);
        
        header("Location: " . BASE_URL);
    }

    public function getCategoryForm(Array $params): Void {
        $id = $params[":ID"];

        $this->authHelper->checkLoggedAndRedict();

        //Validate id
        $this->validateExisting($id);

        $route = "update/category/" . $id;
        $category = $this->categoryModel->getById($id);

        $this->formView->showCategoryFormEdit('category.form.tpl', $category, $route);
    }

    public function updateCategory(Array $params): Void {
        $id = $params[":ID"];
        
        $this->authHelper->checkLoggedAndRedict();
        
        //Validate id
        $this->validateExisting($id);

        //Validate fields
        $this->validateFieldsUpdate($id);

        $name = $_POST['name'];
        $nameId = strtolower($name);
        $description = $_POST['description'];
        $type = $_POST['type'];
            
        $this->categoryModel->update($id, $name, $nameId, $description, $type);

        header("Location: " . BASE_URL);
    }

    private function getFields(): Array {
        return [
            "categoryName" => $_POST["name"],
            "categoryDescription" => $_POST["description"],
            "type" => $_POST["type"] ?? null
        ];
    }

    private function validateFieldsAdd(): Void {
        $fields = $this->getFields();
        $errors = ValidatorFields::searchIncorrectFields($fields);
        if (!empty($errors)) {
            $userId = $this->authHelper->getUserId();
            $cars = $this->carModel->getAllByUserIdWithCategoryName($userId);
            $categories = $this->categoryModel->getAllByIdUser($userId);
            $this->siteView->showHome($cars, $categories, $errors);
            die();
        }
    }

    private function validateFieldsUpdate(String $id): Void {
        $route = 'update/category/' . $id;
        $fields = $this->getFields();
        $errors = ValidatorFields::searchIncorrectFields($fields);
        if (!empty($errors)) {
            $category = $this->categoryModel->getById($id);
            $this->formView->showCategoryFormEdit('category.form.tpl', $category, $route, $errors);
            die();
        }
    }

    private function validateExisting(String $id): Void {
        if(!$this->categoryModel->getById($id)) {
            header("Location: " . BASE_URL);
        }
    }

    private function validateRepeatedNameAdd(String $nameId): Void {
        $errors = ["categoryRepeat" => true];
        if($this->categoryModel->getByUserIdAndName($nameId, $this->authHelper->getUserId())) {
            $userId = $this->authHelper->getUserId();
            $cars = $this->carModel->getAllByUserIdWithCategoryName($userId);
            $categories = $this->categoryModel->getAllByIdUser($userId);
            $this->siteView->showHome($cars, $categories, $errors);
            die();
        }
    }

    private function validateRepeatedNameUpdate(String $nameId, String $id): Void {
        $route = 'update/category/' . $id;
        $errors = ["categoryRepeat" => true];
        if ($this->categoryModel->getByUserIdAndName($nameId, $this->authHelper->getUserId())) {
            $category = $this->categoryModel->getById($id);
            $this->formView->showCategoryFormEdit('category.form.tpl', $category, $route, $errors);
            die();
        }
    }
}