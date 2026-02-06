<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\User\UserModel;

use CodeIgniter\HTTP\ResponseInterface;

class Account extends UserController
{
    public function index()
    {
        $userModel = model(UserModel::class);
        $user = $userModel->findByIdWithDetails($this->userId);
        
        return $this->renderView('pages/account/profile',[
            'appTitle' => setting('App.appName').' | User Profile',
                'pageHeader' => 'Edit Profile',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'Edit Profile', 'url' => ''],
                ],
                'user' => $user,
                // TODO: THIS IS BAD!!!
                'facebook' => $user->getUserSocialLinks('facebook')->link ?? '',
                'twitter'=> $user->getUserSocialLinks('twitter')->link ?? '',
                'instagram'=> $user->getUserSocialLinks('instagram')->link ?? '',
                'snapchat'=> $user->getUserSocialLinks('snapchat')->link ?? '',
            ]);
    }

    public function settings(){
        return $this->renderView('pages/account/settings',[
            'appTitle' => setting('App.appName').' | Account Settings',
                'pageHeader' => 'Account Settings',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'Account Settings', 'url' => ''],
                ],
                'user' => $this->userEntity
            ]);
    }

    public function privacy(){
        return $this->renderView('pages/account/privacy',[
            'appTitle' => setting('App.appName').' | Privacy Settings',
                'pageHeader' => 'Privacy Settings',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'Privacy Settings', 'url' => ''],
                ],
            ]);
    }
}
