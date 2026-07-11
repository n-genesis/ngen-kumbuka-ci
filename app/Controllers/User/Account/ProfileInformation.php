<?php

namespace App\Controllers\User\Account;

use App\Controllers\UserController;
use App\Models\User\UserDetailsModel;
use App\Models\User\UserModel;
use App\Models\User\UserSocialLinksModel;
use CodeIgniter\Database\Config;
use Config\App;

/**
 * CRUD operations for editing User Details Information
 */
class ProfileInformation extends UserController
{
    public function index()
    {

        $userModel = model(UserModel::class);
        $user = $userModel->findByIdWithDetails($this->userId);

        return $this->renderView('pages/account/profile_information', [
            'appTitle' => setting('App.appName') . ' | User Profile',
            'pageHeader' => 'Edit Profile',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'Edit Profile', 'url' => ''],
            ],
            'user' => $user,
            // TODO: THIS IS BAD!!!
            'facebook' => $user->getUserSocialLink('facebook')->link ?? '',
            'twitter' => $user->getUserSocialLink('twitter')->link ?? '',
            'instagram' => $user->getUserSocialLink('instagram')->link ?? '',
            'snapchat' => $user->getUserSocialLink('snapchat')->link ?? '',
            'user_website' => $user->getUserSocialLink('user_website')->link ?? '',
        ]);

    }

    public function update()
    {

        // Check if the logged in user is trying to update their own information
        if ($this->userId !== auth()->id()) {
            return redirect()->to('account/settings')->with('error', 'You do not have permission to edit this user');
        }

        $userDetailsModel = model(UserDetailsModel::class);

        // Check if a POST request
        if ($this->request->getPost()) {
            // Validation Name & Address(optional) failed
            if (!$this->validate('nameRules') && !$this->validate('contactRules')) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $inserted = [
                'user_id' => $this->userId,
                // Personal Information
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'bio' => $this->request->getPost('bio'),
                // Contact Information
                'organization' => $this->request->getPost('organization'),
                'phone' => $this->request->getPost('phone'),
                'address1' => $this->request->getPost('address1'),
                'address2' => $this->request->getPost('address2'),
                'city' => $this->request->getPost('city'),
                'state' => $this->request->getPost('state'),
                'zip' => ($this->request->getPost('zip') == '') ? null : $this->request->getPost('zip'),
            ];

            if ($userDetailsModel->where('user_id', $this->userId)->set($inserted)->update()) {
                return redirect()->back()->with('message', 'User details information updated successfully');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

        }
    }

    public function updateSocial()
    {

        // Check if the logged in user is trying to update their own information
        if ($this->userId !== auth()->id()) {
            return redirect()->to('account/settings')->with('error', 'You do not have permission to edit this user');
        }

        $userSocialLinksModal = model(UserSocialLinksModel::class);

        // Check if a POST request
        if ($this->request->getPost()) {
            // Validation Name & Address(optional) failed
            if (!$this->validate('socialLinkRules')) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $socialLink = [
                'facebook' => $this->request->getPost('facebook'),
                'twitter' => $this->request->getPost('twitter'),
                'instagram' => $this->request->getPost('instagram'),
                'snapchat' => $this->request->getPost('snapchat'),
                'user_website' => $this->request->getPost('user_website'),
            ];


            // TODO: Better check for social links
            foreach ($socialLink as $title => $link) {
                if (!empty($link)) {
                    $data = [
                        'user_id' => $this->userId,
                        'title' => $title,
                        'link' => $link
                    ];
                    // Check if record exists
                    $exists = $userSocialLinksModal->where('user_id', $this->userId)->where('title', $title)->first();
                    if (!$exists) {
                        $userSocialLinksModal->insert($data);
                    } else {
                        $userSocialLinksModal->where('user_id', $this->userId)->where('title', $title)->update(null, $data);
                    }
                } else {
                    $userSocialLinksModal->where('user_id', $this->userId)->where('title', $title)->delete();
                }
            }

            return redirect()->back()->with('message', 'User details information updated successfully');

        }
    }

    public function uploadAvatar()
    {
        $userDetailsModel = model(UserDetailsModel::class);
        
        $validationRule = [
            'user-avatar' => [
                'label' => 'File',
                'rules' => [
                    'uploaded[user-avatar]',
                    'is_image[user-avatar]',
                    'mime_in[user-avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[user-avatar,100]',
                    'max_dims[user-avatar,1024,768]',
                ],
                'errors' => [
                    'max_size' => 'Sorry, but that image is a lil too big. Can you pick another one?'
                ]
            ],
        ];
        if (!$this->validate($validationRule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('user-avatar');

        if ($img->isValid() && !$img->hasMoved()) {
            $appConfig = config(App::class);
            // Path Substring replace %username% See Config App.php
            $imagePath = str_replace('%username%', $this->username, $appConfig->publicUploadPath);
            // Path to upload file
            $filepath = ROOTPATH . 'public/'. $imagePath;            
            // New File name
            $newfile = $img->getRandomName();
            // // Clear Directroy to not
            delete_files($filepath, false, true);
            // Move uploaded image to directroy
            $img->move($filepath, $newfile);

            // Update User Avatar field
            $userDetailsModel->where('user_id',$this->userId)->set([
                'avatar' => "$imagePath/$newfile",
            ])->update();

            return redirect()->back()->with('message', 'Your new avatar images was updated.');

        }

        return redirect()->back()->with('message', 'It seems that file has already been uploaded.');;
    }
}
