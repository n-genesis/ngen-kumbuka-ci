<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\AppConfig\User as userConfig;


class UserController extends BaseController
{
    protected $userConfig;

    protected $userAvatar;
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $view = service('renderer');

        // Get User Configs
        $this->userConfig = config(UserConfig::class);
        // Use Default avatart image in User Config file is sser's not set
        $userAvatar = $this->userDetailsModel->getUserAvatarById($this->userId);
        $userAvatar = $userAvatar->avatar ?? $this->userConfig->defaultAvatar;
        $view->setVar('userAvatar', $userAvatar);
        
        // Create user dashboard link
        $view->setVar('dashboardLink',site_url('dashboard'));

    }
}
