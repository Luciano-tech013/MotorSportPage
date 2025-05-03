<?php
require_once __DIR__ . '/BaseView.php';

class FormView extends BaseView {

    public function __construct(Smarty $smarty) {
        parent::__construct($smarty);
    }

    public function showFormUser(string $template): void {
        parent::renderView('forms/' . $template);
    }

    public function showCategoryFormEdit(string $template, object $category, string $action): void {
        parent::renderView('forms/' . $template, ['category' => $category, 'action' => $action, $template]);
    }

    public function showCarFormEdit(string $template, object $car, array $categories, string $action): void {
        parent::renderView('forms/' . $template, ['car' => $car, 'categories' => $categories, 'action' => $action, 'current_year' => date('Y')]);
    }
}