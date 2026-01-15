<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->renderView('welcome_message',[
            'pageTitle' => 'Hey, Welcome to Kumbuka.',
            'pageDescription' => 'Ready to share some inspiring and memorable notes?'
        ]);
    }
    
}
