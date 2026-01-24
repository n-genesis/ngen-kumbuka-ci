<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use CodeIgniter\HTTP\ResponseInterface;

class Users extends AdminController
{
    public function index()
    {
        // Get all users
        $users = $this->userModel->findAll();

        return $this->renderView('pages/admin/users/index',[
            'appTitle' => setting('App.appName').' | User Managment',
            'pageHeader' => 'User Managment',
            'users' => $users,
        ]);
    }
}
