<?php

require_once __DIR__ . "/../../middlewares/FlashErrorsHelper.php";

abstract class BaseView {

    private Smarty $smarty;

    protected function __construct(Smarty $smarty) {
        $this->smarty = $smarty;
    }

    public function renderView(string $template, array|object $data = []): void {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        
        
        $this->smarty->assign('errors', FlashErrorsHelper::all());
        $this->smarty->display($template);
    }
}