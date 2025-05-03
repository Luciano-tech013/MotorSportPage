<?php

declare(strict_types=1);

require_once __DIR__ . '/BaseView.php';

class SiteView extends BaseView {
    
    public function __construct(Smarty $smarty) {
        parent::__construct($smarty);
    }

    public function showHome(array $cars, array $categories): void {
        parent::renderView('home.tpl', ['cars' => $cars, 'categories' => $categories]);
    }

    public function showPoliticiesPrivacity(): void {
        parent::renderView('privacity.policy.tpl', ['tittle' => "Politica & Privacidad"]);
    }

    public function showContact(): void {
        parent::renderView('contact.tpl', ['tittle' => 'Contactanos en: ']);
    }

    public function showDetail(object $object, string $tittle): void {
        parent::renderView('detail.tpl', ['tittle' => $tittle, 'object' => $object]);
    }

    public function showCategoryFilterList(array $categoryName, array $cars): void {
        parent::renderView('category.filter.list.tpl', ['categories' => $categoryName, 'cars' => $cars]);
    }

    public function showErrorSever(string $msg): void {
        parent::renderView('connection.error.tpl', ['error' => $msg]);
    }
}