<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\AppConfig\Admin as adminConfig;

class AdminController extends BaseController
{

    protected $userAvatar;
    
    protected $userModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        
        $view = service('renderer');
        
        // Get User Configs
        $this->userConfig = config(AdminConfig::class);

        // Use Default avatar image in Admin Config file is avatar's not set
        $this->userAvatar = $this->userAvatar ?? $this->userConfig->defaultAvatar;
        $view->setVar('userAvatar', $this->userAvatar);
        
        // Create Admin dashboard link
        $view->setVar('dashboardLink',site_url('admin/dashboard'));
        
        // Get User Provider for Admin Operations
        $this->userModel = auth()->getProvider();


    }
}
