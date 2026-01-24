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
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Get User Configs
        $this->adminConfig = config(AdminConfig::class);

    }
}
