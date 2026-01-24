<?php

namespace App\Controllers;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends UserController
{
    public function support()
    {
        return $this->renderView('pages/support',[
            'appTitle' => setting('App.appName').' | Technical Support',
        ]);
    }

    public function privacy_policy() {
        return $this->renderView('pages/privacy_policy',[
            'appTitle' => setting('App.appName').' | Privacy Policy',
        ]);
    }

    public function terms_of_use() {
        return $this->renderView('pages/terms_of_use',[
            'appTitle' => setting('App.appName').' | Terms Of Use',
        ]);
    }
}
