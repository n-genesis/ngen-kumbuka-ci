<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\CustomErrors;
// Admin Controllers
use App\Controllers\Admin;
// User Account Controllers
use App\Controllers\User\Account;
// General User Pages
use App\Controllers\User\Dashboard;
use App\Controllers\User\Notes;
use App\Controllers\Pages;
// Public Controllers
use App\Controllers\Public as PublicController;



/**
 * @var RouteCollection $routes
 */


service('auth')->routes($routes);

//$routes->set404Override('App\Controllers\CustomErrors::error404');

/**
 * Main Routes
 * 
 * Most of these are static templates
 */
$routes->group('/', function ($routes) {
    $routes->get('', [Home::class, 'index']);
    $routes->get('privacy_policy', [Pages::class, 'privacy_policy']);
    $routes->get('terms_of_use', [Pages::class, 'terms_of_use']);
    $routes->get('support', [Pages::class, 'support']);
    // Sucessful Logout
    $routes->get('logged_out', [Pages::class, 'logged_out']);
});

/**
 * User Account Routes
 */
$routes->group('',['filter' => ['userfilter']], function ($routes) {

    // User Dashboard
    $routes->get('dashboard', [Dashboard::class, 'index']);

    //Note Routes
    $routes->resource('notes',['namespace' => '', 'controller' => Notes::class]);
    //$routes->get('notes', [Notes::class,'index']);
    //$routes->get('notes/create', [Notes::class, 'create']);
    // $routes->get('notes', [Notes::class, 'index']);
    // $routes->get('notes/update_notes/(:segment)', [[Notes::class, 'update_notes'], '$1']);
    // $routes->post('notes/s/(:segment)', [[Notes::class, 'update_notes'], '$1']);
    // $routes->get('notes/add_notes', [Notes::class, 'add_notes']);
    // $routes->post('notes/add_notes', [Notes::class, 'add_notes']);
    // $routes->post('notes/delete_notes/(:segment)', [[Notes::class, 'delete_notes'], '$1']);

    // Account Routes
    $routes->group('account', function ($routes) {
        $routes->get('', [Account::class, 'index']);

        $routes->post('update', [Account::class,'update']);

        $routes->get('settings', [Account::class, 'settings']);
        $routes->get('privacy', [Account::class,'privacy']);

    });

});

// User Public Profile
$routes->group('user/profile',function ($routes) {
    $routes->get('(:segment)', [[PublicController\User::class,'profile'],'$1']);
});


/**
 * Admin Account Routes
 */
$routes->group('admin',['filter' => ['adminfilter']], function ($routes) {

    $routes->get('dashboard', [Admin\Dashboard::class, 'index']);
 
    // User Management
    $routes->get('users', [Admin\Users::class, 'index']);
    $routes->get('users/create', [Admin\Users::class, 'create']);
    $routes->post('users/store', [Admin\Users::class, 'store']);
    $routes->get('users/edit/(:num)', [[Admin\Users::class, 'edit'], '$1']);
    $routes->post('users/update/(:num)', [[Admin\Users::class, 'update'], '$1']);
    // Delete User
    $routes->delete('users/delete/(:num)', [[Admin\Users::class, 'delete'], '$1']);
    // Activate User
    $routes->post('users/activate/(:num)', [[Admin\Users::class,'activate'],'$1']);
    
    // Settings
    $routes->get('settings', [Admin\Settings::class, 'index']);
    $routes->post('settings/update', [Admin\Settings::class, 'update']);



});