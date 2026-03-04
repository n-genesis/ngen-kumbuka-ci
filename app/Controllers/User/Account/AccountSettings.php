<?php

namespace App\Controllers\User\Account;

use App\Controllers\UserController;
use App\Models\User\UserDetailsModel;
use App\Models\User\UserModel;

use CodeIgniter\HTTP\ResponseInterface;

class AccountSettings extends UserController
{
    public function index()
    {
        $userModel = model(UserModel::class);
        $user = $userModel->findByIdWithDetails($this->userId);
        
        return $this->renderView('pages/account/account_settings',[
            'appTitle' => setting('App.appName').' | Account Settings',
                'pageHeader' => 'Account Settings',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label'=> 'Edit Profile','url'=> site_url('account')],
                    ['label' => 'Account Settings', 'url' => ''],
                ],
                'user' => $this->userEntity,
            ]);
    }

    public function update(){

        $userId  = $this->request->getPost('user_id');

        // Check if the use exists
        $userModel = model(UserModel::class);
        $user = $userModel->find( $userId );
        if(!$user && empty($userId)){
            return redirect()->to('account')->with('error', 'Unable to update user.');
        }

        $userDetailsModel = model(UserDetailsModel::class);

        // echo '<pre>';
        // print_r($userDetailsModel->getDetailsByUserId($userId));
        // echo '</pre>';
        // exit;
        
        // Check if the logged in user is trying to update their own information
        if( $this->userId !== auth()->id()){
            return redirect()->to('account')->with('error', 'You do not have permission to edit this user');
        }

        // Check if a POST request
        if ($this->request->getPost()) {
            $nameRules = [
                'first_name' => [
                    'label'=> 'First Name',
                    'rules' => 'required|alpha_space|min_length[2]|max_length[50]',
                ],
                'last_name'  => [
                    'label'=> 'Last Name',
                    'rules'=> 'required|alpha_space|min_length[2]|max_length[50]',
                ],
            ];
            // Address Validation Rules 
            $rules = [
                'city' => [
                    'label' => 'City',
                    'rules' => 'required|alpha_space|max_length',
                    'errors' => [
                        'alpha_space' => 'The {field} field must only contain alphabetic characters and spaces.'
                    ]
                ],
                'state' => [
                    'label' => 'State',
                    // Requires a 2-letter uppercase USPS abbreviation
                    'rules' => 'required|exact_length[2]|alpha|uppercase',
                    'errors' => [
                        'exact_length' => 'The {field} field must be exactly {param} characters long.',
                        'alpha' => 'The {field} field must only contain letters.',
                        'uppercase' => 'The {field} field must be in uppercase (e.g., TN).'
                    ]
                ],
                'zipcode' => [
                    'label' => 'ZIP Code',
                    // Regex for 5-digit or 5+4 format (e.g., 12345 or 12345-6789)
                    'rules' => 'required|regex_match[/^\\d{5}(-\\d{4})?$/]',
                    'errors' => [
                        'required' => 'The {field} field is required.',
                        'regex_match' => 'The {field} field must be a valid 5 or 9-digit ZIP code (e.g., 12345 or 12345-6789).'
                    ]
                ],
            ];
            
            // Validation failed
            if (!$this->validate($nameRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $inserted = [
                'user_id' => $userId,
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'bio' => $this->request->getPost('bio'),
            ];

            if($userDetailsModel->where('user_id', $userId)->set($inserted)->update()) {
                return redirect()->back()->with('message','User details information updated successfully');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            
        }
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
