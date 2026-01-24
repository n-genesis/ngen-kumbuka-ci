<?php

namespace App\Controllers;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class Notes extends UserController
{
    public function index(string $type = 'blank')
    {
        // echo
        echo "Note Type: $type";
    }
}
