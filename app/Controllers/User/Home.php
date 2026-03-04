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

class Home extends UserController
{
    public function index()
    {
        return $this->renderView('pages/home/index', [
            'appTitle' => setting('App.appName') . ' | Home',
            'pageHeader' => 'Home',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('dashboard')],
                ['label' => 'Quick Start', 'url' => ''],
            ],
            'quickPickPage' => 'dashboard'
        ]);

    }
}
