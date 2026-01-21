<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\User\UserDetailsModel;
use Config\AppConfig\User as userConfig;


class UserController extends BaseController
{
    protected $userConfig;

    protected $userDetails;

    protected $userAvatar;
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Get User Configs
        $this->userConfig = config(UserConfig::class);
        // Get User Deatils
        $this->userDetails = $this->userDetailsModel->getUserAvatarById($this->userId);
        // Get User Avatar NOT USED
        $this->userAvatar = $this->userDetails->avatar ?? $this->userConfig->defaultAvatar;

    }
}
