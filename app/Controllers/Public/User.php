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

            //$userId = $userModel->findByCredentials(['username' => $username]);

            // TODO: Optimize query to include user details in one go
            $user = $userModel->select('users.*, user_details.*')
            ->join('user_details', 'user_details.user_id = users.id','left')
            ->where('users.username', $username)
            ->first(); // Returns an array of User Entity objects

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
