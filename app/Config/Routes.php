<?php

use App\Controllers\Home;
// Notification Controller
use App\Controllers\User\Notification as NotificationController;
// Follower Controller
use App\Controllers\User\Followers as FollowerController;
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
use App\Controllers\System\ShareController as Share;
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


// User Public Profile
// Uses Filter ProfileVisibilityFilter to check if the profile is public or private
$routes->group('user/profile',function ($routes) {
    $routes->get('(:segment)', [[PublicController\User::class,'profile'],'$1'], ['filter' => 'profilevisibility']);
});

// Public User Notes Collection 
// TODO: Add filter to check if the user profile is public or private
$routes->get('users/(:num)/notes', [[User\Notes::class, 'index'], '$1']);
// Public User Note Post
$routes->get('users/(:num)/notes/(:segment)', [[User\Notes::class, 'showPublicNote'], '$1/$2']);
// Public User NoteBooks Collection
$routes->get('users/(:num)/notebooks', [[User\Notebooks::class, 'index'], '$1'], ['filter' => 'profilevisibility']);

/**
 * User Account Routes
 */
$routes->group('',['filter' => ['userfilter']], function ($routes) {

    // QuickPick dashboard view
    $routes->get('gameboard_v1', [Game\FunController::class, 'index']);

    // User Dashboard
    $routes->get('home', [User\Home::class, 'index']);

    

    //Note Routes
    $routes->resource('notes', [
        'namespace' => User::class, 
        'controller' => 'Notes',
        'only' => ['show', 'edit', 'create', 'new', 'update', 'delete']
    ]);
    
    // Upload Note Image
    $routes->post('notebooks/update-notebook-image',[User\Notebooks::class, 'uploadImage']);
    // Notebook Routes
    $routes->resource('notebooks', [
        'namespace' => User::class,
        'controller' => 'Notebooks',
        'only'      => ['index', 'new', 'show', 'edit', 'create', 'update', 'delete']
    ]);


    // User Notifications
    $routes->get('notifications', [NotificationController::class, 'index']);

    // Account Routes
    $routes->group('account', function ($routes) {
        // User Account Information CRUD Routes
        $routes->get('', [User\Account\ProfileInformation::class, 'index']);
        $routes->post('update', [User\Account\ProfileInformation::class,'update']);
        $routes->post('update-social', [User\Account\ProfileInformation::class,'updateSocial']);
        // Update Avatar picture
        $routes->post('update-avatar',[User\Account\ProfileInformation::class, 'uploadAvatar']);

        // User Settings CRUD Routes
        $routes->get('settings', [User\Account\AccountSettings::class, 'index']);
        $routes->post('settings/update', [User\Account\AccountSettings::class,'updateInformation']);
        $routes->post('settings/change-password', [User\Account\AccountSettings::class,'changePassword']);
        
        // User Privacy Settings CRUD Routes
        $routes->get('privacy', [User\Account\PrivacySettings::class,'index']);
        $routes->post('privacy/update', [User\Account\PrivacySettings::class, 'update']);

        // User Activity
        $routes->get('activity', [User\Activity::class, 'index']);
        $routes->get('feed', [User\Feed::class, 'index']);
        $routes->get('followers', [User\Social::class, 'followers']);
    });

    // Toggle Follow/Unfollow
    $routes->post('follow/toggle/(:segment)', [[FollowerController::class,'followUser'], '$1'],['filter' => 'followThrottle']);

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