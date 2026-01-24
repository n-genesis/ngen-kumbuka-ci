<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    public function support()
    {
        return $this->renderView('pages/support',[
            'appTitle' => 'Technical Support',
        ]);
    }

    public function privacy_policy() {
        return $this->renderView('pages/privacy_policy',[
            'appTitle' => 'Privacy Policy',
        ]);
    }

    public function terms_of_use() {
        return $this->renderView('pages/terms_of_use',[
            'appTitle' => 'Terms Of Use',
        ]);
    }
}
