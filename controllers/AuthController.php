<?php

namespace App\Controllers;

use Musanna\MvcCore\Application;
use Musanna\MvcCore\Controller;
use Musanna\MvcCore\Middlewares\AuthMiddleware;
use Musanna\MvcCore\Request;
use Musanna\MvcCore\Response;
use App\Models\LoginForm;
use App\Models\User;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function login(Request $request,Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()) {
            $loginForm->loadData($request->getBody());
            
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
        'model' =>$loginForm,
        ]);
    }
    public function register(Request $request)
    {
        $user = new User();
        $this->setLayout('auth');
        if($request->isPost()) {
            $user->loadData($request->getBody());

            if($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            
            return $this->render('register',[
                'model' => $user
            ]);
        }
        return $this->render('register',[
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        
        return $this->render('profile');
    }
}