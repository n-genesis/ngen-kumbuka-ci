<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * Varable to store global data to be shared accross views
     * @var list<mixed>
     */
    protected object $globalData;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');

        // Get Config values or store settings
        $this->globalData = (object) [
            'appName' => service('settings')->get('App.appName'),
            'appTitle' => service('settings')->get('App.appTitle'),
            'appEmail' => service('settings')->get('App.appEmail'),
            'appAuthor' => service('settings')->get('App.appAuthor'),
            'appAuthWebsite' => service('settings')->get('App.appAuthWebsite'),
            'appDesc' => service('settings')->get('App.appDesc'),
        ];

        $view = service('renderer');
        // Add Global Data to View $data array
        $view->setData((array) $this->globalData);


        // Build sidebar links
        // $sidebarConfig = config('Sidebar');
        // $this->globalData['userSidebarOpts'] = $sidebarConfig->userSidebarOpts;

        // Check if the USer is logged in
        // if (auth()->loggedIn()) {
        //     $userId = auth()->id();// Get User ID
        //     $this->globalData['username'] = auth()->user()->username;

        //     $userDetailsModel = new UserDetailsModel(); // User Details Model
        //     // Use Default avatart image in User Config file is sser's not set
        //     $userAvatar = $userDetailsModel->getUserAvatarById($userId);
        //     $userConfig = config(User::class);
        //     $this->globalData['userAvatar'] = $userAvatar->avatar ?? $userConfig->defaultAvatar;

        // } else {
        //     $this->globalData['username'] = 'Guest';
        // }
    }

    public function renderView(string $viewName, array $data = [])
    {
        // Add data array values
        return view($viewName, $data);
    }

    public function getOjbData()
    {
        return $this->globalData;
    }
}
