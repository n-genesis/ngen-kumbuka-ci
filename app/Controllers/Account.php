<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class Account extends UserController
{
    public function index()
    {
        //
    }

    public function settings(){
        return $this->renderView('account/settings',[
            'appTitle' => setting('App.appName').' | User Settings',
                'pageHeader' => 'Dashboard',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'Dashboard', 'url' => ''],
                ],
            ]);
    }
}
