<?php
/**
 * ROOT Home Page
 * 
 * This is the ROOT Controller
 * 
 * @package    App\Controllers
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-bootsnippets-ci
 */
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
