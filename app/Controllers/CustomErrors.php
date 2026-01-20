<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CustomErrors extends BaseController
{
    public function error404(): string
    {
        $this->response->setStatusCode(404);
        return $this->renderView('errors/html/custom_error_404');
    }
}
