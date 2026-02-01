<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Admin User Managment Controller
 * 
 * This controller handles all user-related operations within the admin panel, 
 * and profile management within the application.
 * 
 * @package    App\Controllers
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-bootsnippets-ci
 */
class Users extends AdminController
{
    public function index()
    {
        // Get all Users w/ User Details information
        $users = $this->userModel->findAllWithDetails();

        return $this->renderView('pages/admin/users/index',[
            'appTitle' => setting('App.appName').' | User Managment',
            'pageHeader' => 'User Managment',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('admin/dashboard')],
                ['label' => 'User Managment', 'url' => ''],
            ],
            'users' => $users,
        ]);
    }
}
