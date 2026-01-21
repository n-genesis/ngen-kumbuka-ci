<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\CustomErrors;
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
    $routes->get('terms_and_conditions', [Pages::class, 'terms_and_conditions']);
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

    // User Account Routes
    $routes->group('account', static function ($routes) {
        
    });


});