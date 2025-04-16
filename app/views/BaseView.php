<?php

abstract class BaseView {

    private Smarty $smarty;

    public function __construct(Smarty $smarty) {
        $this->smarty = $smarty;
    }

    public function renderView(String $template, Array|Object $data = []): Void {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        $this->smarty->display($template);
    }
}