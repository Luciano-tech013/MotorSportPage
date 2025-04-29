<?php
require_once __DIR__ . '/../../utils/validators/ValidatorFields.php';

class UserController {

    private static UserController $instance;
    private UserModel $userModel;
    private FormView $formView;
    private AuthHelper $authHelper;

    private function __construct(UserModel $userModel, FormView $formView, AuthHelper $authHelper){
        $this->userModel = $userModel;
        $this->formView = $formView;
        $this->authHelper = $authHelper;
    }

    public static function getInstance(UserModel $usuariosModel, FormView $formView, AuthHelper $authHelper): UserController{
        if (!isset(self::$instance)) {
            self::$instance = new UserController($usuariosModel, $formView, $authHelper);
        }
        
        return self::$instance;
    }

    public function getSignUpForm(): Void {
        $this->formView->showFormUser('signup.form.tpl');
    }

    public function getSignInForm(): Void {
        $this->formView->showFormUser('signin.form.tpl');
    }

    public function createUser(): Void {
        $this->validateFields();

        $username = $_POST['name'];
        $nameId = strtolower($username);
        $this->validateRepeatedName($nameId);

        $userpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $this->userModel->add($username, $userpassword, $nameId);
            
        header("Location: " . BASE_URL . "login");
    }

    public function destroyUser(): Void {
        
    }

    private function getFields(): array
    {
        return [
            "username" => $_POST["name"],
            "password" => $_POST["password"],
            "politicies" => $_POST["politicies"] ?? null
        ];
    }

    private function validateFields(): Void {
        $fields = $this->getFields();
        $errors = ValidatorFields::searchIncorrectFields($fields);
        if (!empty($errors)) {
            $this->formView->showFormUser('signup.form.tpl', $errors);
            die();
        }
    }

    private function validateRepeatedName($nameId): Void {
        $errors = ["usernameRepeat" => true];
        if ($this->userModel->getByUserIdAndName($nameId, $this->authHelper->getUserId())) {
            $this->formView->showFormUser('signup.form.tpl', $errors);
            die();
        }
    }
}
