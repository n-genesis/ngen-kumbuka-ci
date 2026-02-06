<?php
/**
 * User Backend Dashboard Controller
 * 
 * This controller handles all user-related authentication 
 * and profile management within the application.
 * 
 * @package    App\Controllers
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-bootsnippets-ci
 */
namespace App\Controllers\User;

use App\Controllers\UserController;

class Dashboard extends UserController
{
    public function index()
    {
        if ($this->userEntity->inGroup('admin')) {
            // Retrieve a custom 'admin_login' from settings
            $destination = setting('Auth.redirects')['admin_login'];

            // Perform the redirect
            return redirect()->to($destination);
        } else {
            // Default view for regular users
            return $this->renderView('pages/home/dashboard',[
                'appTitle' => setting('App.appName').' | Dashbord',
                'pageHeader' => 'Dashboard',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'Dashboard', 'url' => ''],
                ],
            ]);
        }
        
    }
}
