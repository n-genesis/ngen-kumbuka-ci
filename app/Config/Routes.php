<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\CustomErrors;


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
$routes->group('user',['filter' => ['userfilter']], function ($routes) {

    // User Dashboard
    $routes->get('', [User::class, 'index']);


});

/**
 * Admin Account Routes
 */
$routes->group('admin',['filter' => ['adminfilter']], function ($routes) {

    // User Account Routes
    $routes->group('account', static function ($routes) {
        
    });


});