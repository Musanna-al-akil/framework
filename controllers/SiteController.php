<?php

namespace App\Controllers;

use Musanna\MvcCore\Application;
use Musanna\MvcCore\Response;
use App\Models\ContactForm;
use Musanna\MvcCore\Controller;
use Musanna\MvcCore\Request;

class SiteController extends Controller
{
    public function home(): mixed
    {
        $params = [
            'name'  => 'Musanna'
        ];

        return $this->render('home',$params);
    }
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();

        if($request->isPost()) {
         $contact->loadData($request->getBody());
        
         if($contact->validate() && $contact->send())
         {
            Application::$app->session->setFlash('success', 'Thanks for contact us');
            return $response->redirect('/contact');
            
         }
        }
        return $this->render('contact',[
            'model' => $contact
        ]);
    }

    public function handleContact(Request $request): mixed
    {
        $body   = $request->getBody();
        var_dump($body);
        return "data handle";
    }
}