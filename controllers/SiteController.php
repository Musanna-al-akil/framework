<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

class SiteController extends Controller
{
    public function home(): mixed
    {
        $params = [
            'name'  => 'Musanna'
        ];

        return $this->render('home',$params);
    }
    public function contact(): mixed
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request): mixed
    {
        $body   = $request->getBody();
        var_dump($body);
        return "data handle";
    }
}