<?php

namespace App\Controllers\User\Account;


use App\Controllers\UserController;
use App\Models\User\UserModel;
/**
 * Controller for User Privacy Settings
 * 
 * Using the Helper Preference (https://github.com/tattersoftware/codeigniter4-preferences)
 * 
 */
class PrivacySettings extends UserController
{
    protected $userId;
    protected $userModel;
    protected $userChoices;
    public function __construct()
    {
        $this->userModel = model(UserModel::class);


        $this->userChoices = [// User Nottification Setting Choices
            'accountPrivacy',
            'accountActivityStatus',
            'allowFollowers',
        ];
    }
    /**
     * Summary of index
     * Show current User Notifications & allows user edits
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function index()
    {
        // Get Current User Model
        $user = $this->userModel->findById($this->userId);

        $checked = [];

        foreach ($this->userChoices as $value) {
            $setting = preference("Users.{$value}");
            if (isset($setting)) {
                $checked[$value] = 'checked';
            } else {
                $checked[$value] = '';
            }
        }


        // Dump to View
        return $this->renderView('pages/account/privacy_settings', 
        [
            'appTitle' => setting('App.appName').' | Privacy Settings',
                'pageHeader' => 'Privacy Settings',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'Privacy Settings', 'url' => ''],
                ],
                'user' => $user,
            'checked' => $checked,
            ]);

    }
    /**
     * Summary of update
     * Update User Identity and User Details Tables
     * @param mixed $id User Id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update()
    {

        // Get user
        $user = $this->userModel->findById($this->userId);

        // Check if user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate User Details
        // Get Checkbox selected
        $choices = $this->request->getPost('privacySetting');

        // Loop Over array list
        foreach ($this->userChoices as $value) {
            $setting = "Users.{$value}";// Setting value
            if ($choices !== null) {
                if (in_array($value, $choices)) {
                    preference($setting, true);// If found set
                } else {
                    preference($setting, null);// If NOT found remove
                }
            }else {
                preference($setting, null);// If NOT found remove
            }
            // echo '<pre>';
            // var_dump($setting);
            // echo '</pre>';
      
        }

        return redirect()->back()->with('message', 'Privacy Settings updated successfully.');

    }


}
