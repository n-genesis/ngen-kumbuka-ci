<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\CustomErrors;
// Admin Controllers
use App\Controllers\Admin;
// General User Pages
use App\Controllers\Dashboard;
use App\Controllers\Notes;
use App\Controllers\Pages;



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
    $routes->resource('notes');
    //$routes->get('notes/(:segment)', [[Notes::class, 'newNote'], '$1']);
    // $routes->get('notes', [Notes::class, 'index']);
    // $routes->get('notes/update_notes/(:segment)', [[Notes::class, 'update_notes'], '$1']);
    // $routes->post('notes/update_notes/(:segment)', [[Notes::class, 'update_notes'], '$1']);
    // $routes->get('notes/add_notes', [Notes::class, 'add_notes']);
    // $routes->post('notes/add_notes', [Notes::class, 'add_notes']);
    // $routes->post('notes/delete_notes/(:segment)', [[Notes::class, 'delete_notes'], '$1']);

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
    $routes->get('users/delete/(:num)', [[Admin\Users::class, 'delete'],'$1']);
    
    // Settings
    $routes->get('settings', [Admin\Settings::class, 'index']);
    $routes->post('settings/update', [Admin\Settings::class, 'update']);



});