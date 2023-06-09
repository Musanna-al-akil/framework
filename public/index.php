<?php

require_once __DIR__ . "/../core/Config.php";
require_once __DIR__ . "/../vendor/autoload.php";

use App\Controllers\AuthController;
use App\Controllers\SiteController;
use App\Core\Application;
use App\Models\User;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db'    => [
        'dsn'       => $_ENV['DB_DSN'],
        'user'      => $_ENV['DB_USER'],
        'password'  => $_ENV['DB_PASSWORD']
    ]
    ];
    
$app = new Application(__DIR__ . "/../", $config);

$app->router->get('/', [SiteController::class,'home']);
$app->router->get('/contact', [SiteController::class,'contact']);
$app->router->post('/contact', [SiteController::class,'contact']);

$app->router->get('/login', [AuthController::class,'login']);
$app->router->get('/register', [AuthController::class,'register']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->post('/register', [AuthController::class,'register']);
$app->router->get('/logout', [AuthController::class,'logout']);
$app->router->get('/profile', [AuthController::class,'profile']);

$app->run();