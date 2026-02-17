<?php

use App\Controllers\Home;
use App\Controllers\NotificationController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\CustomErrors;
// Admin Controllers
use App\Controllers\Admin;
// User Account Controllers
use App\Controllers\User;
// General Pages
use App\Controllers\Pages;
use App\Controllers\System\SearchController as Search;
// Share Controller
use App\Controllers\ShareController as Share;
// Public Controllers
use App\Controllers\Public as PublicController;
// Fun COntroller
use App\Controllers\Game;

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

    // Search
    $routes->post('search', [Search::class,'index']);
});

/**
 * User Account Routes
 */
$routes->group('',['filter' => ['userfilter']], function ($routes) {

    $routes->get('gameboard_v1', [Game\FunController::class, 'index']);

    // User Dashboard
    $routes->get('home', [User\Home::class, 'index']);

    //Note Routes
    $routes->resource('note',['namespace' => '', 'controller' => User\Notes::class]);
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
        // User Account Information CRUD Routes
        $routes->get('', [User\Account\ProfileInformation::class, 'index']);
        $routes->post('update', [User\Account\ProfileInformation::class,'update']);

        // User Settings CRUD Routes
        $routes->get('settings', [User\Account\AccountSettings::class, 'index']);
        
        // User Privacy Settings CRUD Routes
        $routes->get('privacy', [User\Account\PrivacySettings::class,'index']);
        $routes->post('privacy/update', [User\Account\PrivacySettings::class, 'update']);

        // User Activity
        $routes->get('activity', [User\Activity::class, 'index']);
        $routes->get('feed', [User\Feed::class, 'index']);
        $routes->get('followers', [User\Social::class, 'followers']);
    });

});

// Share feature
$routes->group('share',['filter' => ['userfilter']], function ($routes) {
    $routes->post('note', [Share::class,'shareNote']);
    $routes->post('ajax', [Share::class,'shareNoteAjax']);
});

/**
 * Notifications using Sever-Sent Events
 * 
 * Routes to NotificationController stream method
 * to use with SSE
 */
$routes->group('notifications',['filter'=> ['ssefilter']], function($routes) {
    $routes->get('stream', [NotificationController::class,'stream']);
});

// AJAX controller for moarking notifications as read
$routes->group('ajax',['filter'=> ['userfilter']], function ($routes) {
    $routes->post('read', [NotificationController::class,'markAsRead']);
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