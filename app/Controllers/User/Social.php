<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class Social extends UserController
{
    public function followers()
    {

        return view('pages/user/followers', [
            'appTitle' => setting('App.appName') . ' | Followers',
            'pageHeader' => 'Followers',
            'breadcrumbLinks' => [
                ['label' => 'Followers', 'url' => site_url('account/followers')],
            ],
            
        ]);
    }
}
