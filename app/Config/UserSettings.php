<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class UserSettings extends BaseConfig
{
    /**
     * Default avart iamge
     * @var string
     */
    public string $defaultAvatar = '/uploads/default-avatar.png';
    public $accountPrivacy = null; // Default for account privacy
    public bool $accountActivityStatus = true; // Default to show activity status
    public bool $allowFollowers = true; // Default to allow followers
    public string $profileVisibility = 'public'; // Default profile visibility (public, private, friends)
    
}
