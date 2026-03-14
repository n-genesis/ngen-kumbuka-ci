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
            'profileVisibility',
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
            $setting = preference("UserSettings.{$value}");
            if (isset($setting)) {
            //     echo '<pre>';
            // print_r("UserSettings.{$value}\n");
            // echo "setting v: ".$setting."\n";
            // echo '</pre>';
            // exit;
                // Special handling for profile visibility to set radio button states
                if ($value === 'profileVisibility') {
                    $checked[$value] = [
                        'public' => $setting === 'public' ? 'checked' : '',
                        'private' => $setting === 'private' ? 'checked' : '',
                        'friends' => $setting === 'friends' ? 'checked' : '',
                    ];
                } else {
                    $checked[$value] = $setting ? 'checked' : '';
                }
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

        // Get Account Privacy Checkbox selected
        $accountPrivacy = $this->request->getPost('accountPrivacy');
        if ($accountPrivacy) {
            preference('UserSettings.accountPrivacy', $accountPrivacy);
        } else if ($accountPrivacy === null) {
            preference('UserSettings.accountPrivacy', null);
        }

        // Get Account Activity Status Checkbox selected
        $accountActivityStatus = $this->request->getPost('accountActivityStatus');
        if ($accountActivityStatus) {
            preference('UserSettings.accountActivityStatus', (bool) $accountActivityStatus);
        } else if ($accountActivityStatus === null) {
            preference('UserSettings.accountActivityStatus', null);
        }

        // Get Allow Followers Checkbox selected
        $allowFollowers = $this->request->getPost('allowFollowers');
        if ($allowFollowers) {
            preference('UserSettings.allowFollowers', (bool) $allowFollowers);
        } else if ($allowFollowers === null) {
            preference('UserSettings.allowFollowers', null);
        }

        // Get Profile Visibility Radio selected
        $profileVisibility = $this->request->getPost('profileVisibility');
        // Update User Settings using the Helper Preference
        if($profileVisibility) {
            preference('UserSettings.profileVisibility', $profileVisibility);
        } else if($profileVisibility === null) {
            preference('UserSettings.profileVisibility', null);
        }

        // echo '<pre>';
        // var_dump($profileVisibility);
        // echo '</pre>';
        // exit;

        return redirect()->back()->with('message', 'Privacy Settings updated successfully.');

    }


}
