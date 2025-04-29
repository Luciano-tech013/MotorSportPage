<?php
require_once __DIR__ . '/BaseView.php';

class FormView extends BaseView {

    private static FormView $instance;

    private function __construct(Smarty $smarty) {
        parent::__construct($smarty);
    }

    public static function getInstance(Smarty $smarty): FormView {
        if (!isset(self::$instance)) {
            self::$instance = new FormView($smarty);
        }

        return self::$instance;
    }

    public function showFormUser(String $template, Array $errors = []): Void {
        parent::renderView($template, ['errors' => $errors]);
    }

    public function showCategoryFormEdit(String $template, Object $category, String $action, Array $errors = []): Void {
        parent::renderView($template, ['category' => $category, 'action' => $action, 'errors' => $errors], $template);
    }

    public function showCarFormEdit(String $template, Object $car, Array $categories, String $action, Array $errors = []): Void {
        parent::renderView($template, ['car' => $car, 'categories' => $categories, 'action' => $action, 'errors' => $errors]);
    }
}