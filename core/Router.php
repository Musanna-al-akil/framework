<?php

namespace App\Core;

class Router
{
    protected array $routes = []; 

    public function __construct(
        public readonly Request $request,
        public readonly Response $response,
    ) {
    }
    public function get(string $path, callable|string|array $callback)
    {
        $this->routes['get'][$path] = $callback;
        return $this;
    }

    public function post(string $path, callable|string|array $callback)
    {
        $this->routes['post'][$path] = $callback;
        return $this;
    }

    public function resolve()
    {
        $path    = $this->request->getPath();
        $method  = $this->request->getMethod();
        $callback= $this->routes[$method][$path] ?? false;

        if(!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderContent("not Found");
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }
        if(is_array($callback)) {
            Application::$app->controller= new $callback[0];
            $callback[0] = Application::$app->controller;

            return call_user_func_array($callback,[$this->request,$this->response]);
        }
        return call_user_func($callback,$this->request,$this->response);
    }
    
    public function renderView($view, $params =[])
    {
        $layoutContent  = $this->layoutContent();
        $viewContent    = $this->renderOnlyView($view,$params);

        return str_replace('{{content}}',$viewContent,$layoutContent);
    }
    protected function renderContent($Content)
    {
        $layoutContent  = $this->layoutContent();

        return str_replace('{{content}}', $Content,$layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "views/$view.php";;
        return ob_get_clean();
    }

}