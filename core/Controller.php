<?php

namespace App\Core;

class Controller
{
    public string $layout = "main";

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($page, $params = [])
    {
        return Application::$app->router->renderView($page, $params);
    }
}