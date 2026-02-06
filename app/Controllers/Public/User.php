<?php

namespace App\Controllers\Public;

use App\Controllers\UserController;
use App\Models\User\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends UserController
{
    public function profile(string $username = null)
    {
        if(empty($username)){
            
        }
        // Load user data based on username
            $userModel = model(UserModel::class);

            // TODO: Optimize query to include user details in one go
            $user = $userModel
                    ->join('user_details','users.id = user_details.user_id','left')
                    ->where('username', $username)->first();

            if(!$user){
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User not found");
            }

            return $this->renderView('public/user/profile',[
                'appTitle' => setting('App.appName').' | '.$user->username.' Profile',
                'pageHeader' => $user->username.' Profile',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('')],
                    ['label' => $user->username.' Profile', 'url' => ''],
                ],
                'user' => $user,
            ]);
    }
}
