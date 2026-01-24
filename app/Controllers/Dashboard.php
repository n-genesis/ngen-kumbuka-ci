<?php

namespace App\Controllers;

use App\Controllers\UserController;

class Dashboard extends UserController
{
    public function index()
    {
        if ($this->userModel->inGroup('admin')) {
            return setting('Auth.redirects')['admin_login'];;
        } else {
            // Default view for regular users
            return $this->renderView('pages/home/dashboard',[
                'appTitle' => setting('App.appName').' | Dashbord',
            ]);
        }
        
    }
}
