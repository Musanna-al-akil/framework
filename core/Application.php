<?php

declare(strict_types=1);

namespace App\Core;

class Application
{
    public static $ROOT_DIR;

    public string $userClass;
    public static Application $app;
    public readonly Router $router;
    public readonly Request $request;
    public readonly Response $response;
    public Session $session;
    public Database $db;
    public ?DbModel $user ;
    public Controller $controller;
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app      = $this;
        $this->request  = new Request();
        $this->response = new Response();
        $this->session  = new Session();
        $this->router   = new Router($this->request,$this->response);

        $this->db       = new Database($config['db']);
        $this->userClass= $config['userClass'];

        $primaryValue = $this->session->get('user');
        if($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }else {
            $this->user = null;
        }
        
        
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function login(?DbModel $user)
    {
        $this->user = $user;

        $primaryKey = $user->primaryKey();

        $primaryValue = $user->{$primaryKey};

        $this->session->set('user',$primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
}