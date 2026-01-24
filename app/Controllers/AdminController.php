<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\AppConfig\Admin as adminConfig;

class AdminController extends BaseController
{
    protected $adminConfig;

    protected $adminAvatar;
    
    protected $userModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        
        $view = service('renderer');
        
        // Get User Configs
        $this->adminConfig = config(AdminConfig::class);

        // Use Default avatart image in User Config file is sser's not set
        $userAvatar = $this->userDetailsModel->getUserAvatarById($this->userId);
        $userAvatar = $userAvatar->avatar ?? $this->adminConfig->defaultAvatar;
        $view->setVar('userAvatar', $userAvatar);
        
        // Create Admin dashboard link
        $view->setVar('dashboardLink',site_url('admin/dashboard'));
        
        // Get User Provider for Admin Operations
        $this->userModel = auth()->getProvider();


    }
}
