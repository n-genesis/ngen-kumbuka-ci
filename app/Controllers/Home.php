<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (auth()->loggedIn()) {
            // Retrieve a custom 'admin_login' from settings
            $destination = setting('Auth.redirects')['login'];

            // Perform the redirect
            return redirect()->to($destination);
        }
        return $this->renderView('welcome_message');
    }
    
}
