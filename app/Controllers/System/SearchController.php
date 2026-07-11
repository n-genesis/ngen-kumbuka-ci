<?php
/**
 * System Search Controller
 * 
 * This controller handles system search results and querying
 * 
 * @package    App\Controllers\System
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-kumbuka-ci
 */
namespace App\Controllers\System;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class SearchController extends UserController
{
    public function index()
    {
        return $this->renderView('pages/system/search', [
            'appTitle' => setting('App.appName') . ' | Search',
            'pageHeader' => 'Search',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('dashboard')],
                ['label' => 'Quick Pick', 'url' => site_url('dashboard')],
                ['label'=> 'Search', ''],
            ],
        ]);
    }
}
