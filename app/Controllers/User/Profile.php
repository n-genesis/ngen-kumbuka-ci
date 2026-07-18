<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\FollowerModel;
use App\Models\User\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends UserController
{
    public function profile(string $username = '')
    {
        if (empty($username)) {

        }
        // Load user data based on username
        $userModel = model(UserModel::class);

        $followerModel = model(FollowerModel::class);

        $user = $userModel->findByUsername($username);

        // If user not found, redirect to home with error message
        if (!$user) {
            return redirect()->to('login')->with('error', 'User not found.');
        }

        $socialLinks = null;
        // Check for User Social Links
        $socialLinks = (object) [
                'facebook' => $user->getUserSocialLink('facebook')->link ?? '',
                'twitter' => $user->getUserSocialLink('twitter')->link ?? '',
                'instagram' => $user->getUserSocialLink('instagram')->link ?? '',
                'snapchat' => $user->getUserSocialLink('snapchat')->link ?? '',
            ];

        // Get User account Privacy Settings
        $accountPrivacy = setting()->get("UserSettings.accountPrivacy","user:$user->id");
        // echo '<pre>';
        // var_dump($user->hasSocialLinks);
        // echo '</pre>';
        // exit;

        return $this->renderView('pages/profile/index', [
            'appTitle' => setting('App.appName') . ' | ' . $user->username . ' Profile',
            'pageHeader' => "$user->username Profile",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('')],
                ['label' => "$user->username Profile", 'url' => ''],
            ],
            'user' => $user,
            'user_links' => $socialLinks,
            'accountPrivacy' => $accountPrivacy,
            'user_website' => $user->getUserSocialLink('user_website')->link ?? '',
            'followerModel' => $followerModel,
        ]);
    }
}
