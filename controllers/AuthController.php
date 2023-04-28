<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Core\Request;
use App\Models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }
    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        $this->setLayout('auth');
        if($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if($registerModel->validate() && $registerModel->register()) {
                return 'success';
            }
            
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        return $this->render('register',[
            'model' => $registerModel
        ]);
    }
}