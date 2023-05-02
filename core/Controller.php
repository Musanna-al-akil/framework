<?php

namespace App\Core;

use App\Core\Middlewares\BaseMiddleware;

class Controller
{
    public string $layout = "main";
    public string $action = '';

    /**
     * @var \App\Core\Middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($page, $params = [])
    {
        return Application::$app->view->renderView($page, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

	/** @return array */
	public function getMiddlewares(): array 
    {
		return $this->middlewares;
	}
}