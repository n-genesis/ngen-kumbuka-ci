<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends UserController
{
    public function index()
    {
        return $this->renderView('pages/home/dashboard');
    }
}
