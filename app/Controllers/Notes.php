<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Notes extends BaseController
{
    public function index(string $type = 'blank')
    {
        // echo
        echo "Note Type: $type";
    }
}
