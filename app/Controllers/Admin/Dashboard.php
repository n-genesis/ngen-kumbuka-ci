<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends AdminController
{
    public function index()
    {
        return $this->renderView('pages/admin/dashboard',[
            'appTitle' => setting('App.appName').' | Admin Dashboard',
        ]);
    }
}
