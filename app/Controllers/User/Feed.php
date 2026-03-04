<?php

namespace App\Controllers\User;


use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class Feed extends UserController
{
    public function index()
    {
        $data = [
            'appTitle' => setting('App.appName') . ' | Recent Activity',
            'pageHeader' => 'Kumbuka Feed',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('dashboard')],
                ['label' => 'Notebooks', 'url' => site_url('notebooks')],
                ['label' => 'Feed', 'url' => ''],
            ],
        ];

        return view('pages/user/feed', $data);
    }
}
