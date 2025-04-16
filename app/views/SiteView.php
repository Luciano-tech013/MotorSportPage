<?php
require_once __DIR__ . '/BaseView.php';

class SiteView extends BaseView {
    
    private static SiteView $instance;
 
    private function __construct(Smarty $smarty) {
        parent::__construct($smarty);
    }

    public static function getInstance(Smarty $smarty): SiteView {
        if(!isset(self::$instance))
            self::$instance = new SiteView($smarty);

        return self::$instance;
    }

    public function showHome(Array $cars, Array $categories, Array $errors): Void {
        parent::renderView('home.tpl', ['cars' => $cars, 'categories' => $categories, 'errors' => $errors]);
    }

    public function showPoliticiesPrivacity(): Void {
        parent::renderView('privacity.policy.tpl', ['tittle' => "Politica & Privacidad"]);
    }

    public function showContact(): Void {
        parent::renderView('contact.tpl', ['tittle' => 'Contactanos en: ']);
    }

    public function showErrorSever(): Void {
        parent::renderView('connection.error.tpl');
    }

    public function showDetail(Object $car): Void {
        parent::renderView('car.detail.tpl', ['tittle' => 'Descripcion del auto', 'car' => $car]);
    }

    public function showFilterList(Array $categoryName, Array $cars): Void {
        parent::renderView('category.filter.list.tpl', ['categories' => $categoryName, 'cars' => $cars]);
    }
}