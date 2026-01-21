<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends UserController
{
    public function index()
    {
        if ($this->userModel->inGroup('admin')) {
            return setting('Auth.redirects')['admin_login'];;
        } else {
            // Default view for regular users
            return $this->renderView('pages/home/dashboard');
        }
        
    }
}
