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
            'label' => 'Profile Picture',
            'rules' => [
                'uploaded[user-avatar]', // Ensures a file was actually sent (Required field)
                'is_image[user-avatar]', // Verifies the file header structure represents an actual image
                'mime_in[user-avatar,image/jpg,image/jpeg,image/png,image/webp]', // Explicit whitelist
                'max_size[user-avatar,2048]', // Restricts file weight to 2048 KB (2MB)
                'max_dims[user-avatar,1200,1200]', // Caps maximum width and height resolutions
            ]
        ]
    ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('user-avatar');

        if ($img->isValid() && !$img->hasMoved()) {
            $appConfig = config(App::class);
            // Path Substring replace %username% See Config App.php
            $dirHash = md5($this->username . '|' . $this->userId);
            $imagePath = str_replace('%username%', $dirHash, $appConfig->publicUploadPath);
            // Path to upload file
            $filepath = ROOTPATH . 'public/' . $imagePath;
            
            // New File name
            $newfile = $img->getRandomName();
            // // Clear Directroy to not
            delete_files($filepath, false, true);
            // Move uploaded image to directroy
            $img->move($filepath, $newfile);

            // Path to new file
            $newFile = "$imagePath/$newfile";


            // Crop the image to a perfect 400x400px centered square automatically
            \Config\Services::image()
                ->withFile($newFile)
                ->fit(400, 400, 'center') // Dimensions: Width, Height, Position Anchor
                ->save($newFile); // Overwrites the original raw file securely


            // Update User Avatar field
            $userDetailsModel->where('user_id', $this->userId)->set([
                'avatar' => $newFile,
            ])->update();

            return redirect()->back()->with('message', 'Your new avatar images was updated.');

        }

        return redirect()->back()->with('message', 'It seems that file has already been uploaded.');
        ;
    }

    public function uploadCoverImage()
    {
        $userDetailsModel = model(UserDetailsModel::class);
        // $img = $this->request->getFile('cover-image');
        // echo '<pre>';
        // var_dump($img = $this->request->getFile('cover-image'));
        // echo '</pre>';
        // exit;
        $validationRule = [
            'cover_image' => [
                'label' => 'Cover Image',
                'rules' => [
                    'uploaded[cover_image]', // Change to 'permit_empty' if completely optional
                    'is_image[cover_image]',
                    'mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[cover_image,2048]', // 2MB max weight limit
                    'max_dims[cover_image,4096,4096]', // High safety ceiling for 4K displays
                ],
                'errors' => [
                    'uploaded' => 'Please select a cover image to upload.',
                    'is_image' => 'The uploaded file must be a valid graphic format.',
                    'mime_in' => 'Only JPG, JPEG, PNG, and WebP formats are allowed.',
                    'max_size' => 'The cover image cannot be larger than 2MB.',
                    'max_dims' => 'The image resolution is too high. Keep it under 4096x4096px.',
                ],
            ],
        ];



        if ($this->validate($validationRule)) {
            $img = $this->request->getFile('cover_image');

            if ($img->isValid() && !$img->hasMoved()) {

            $appConfig = config(App::class);
            // Path Substring replace %username% See Config App.php
            $dirHash = md5($this->username . '|' . $this->userId);
            $imagePath = str_replace('%username%', $dirHash, $appConfig->publicUploadPath);
            // Path to upload file
            $filepath = ROOTPATH . 'public/' . $imagePath;
            // New File name
            $newfile = $img->getRandomName();
            // // Clear Directroy to not
            delete_files($filepath, false, true);
            // Move uploaded image to directroy
            $img->move($filepath, $newfile);
            // Path to new file
            $newFile = "$imagePath/$newfile";

            // Update User Avatar field
            $userDetailsModel->where('user_id', $this->userId)->set([
                'cover_image' => $newFile,
            ])->update();

                $targetWidth = 1200;
                $targetHeight = 400;

                // 2. Process using CI4 Image Service
                $imageService = \Config\Services::image()
                    ->withFile($newFile);

                // Option A: Smart Crop & Scale to ensure canvas is perfectly filled
                $imageService->fit($targetWidth, $targetHeight, 'center')
                    ->save($newFile);
            }

            return redirect()->back()->with('message', 'Your new profile cover images was updated.');
        }

    }
}
