<?php

declare(strict_types=1);

namespace App\Core;

class Application
{

    public static $ROOT_DIR;
    public static Application $app;
    public readonly Router $router;
    public readonly Request $request;
    public readonly Response $response;
    public Controller $controller;
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
        
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}