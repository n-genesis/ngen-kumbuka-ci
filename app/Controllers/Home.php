<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->renderView('welcome_message',[
            'pageTitle' => 'Home Page'
        ]);
    }
}
