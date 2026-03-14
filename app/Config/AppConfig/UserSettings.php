<?php

namespace Config\AppConfig;

use CodeIgniter\Config\BaseConfig;

class UserSettings extends BaseConfig
{
    /**
     * Default avart iamge
     * @var string
     */
    public string $defaultAvatar = '/uploads/default-avatar.png';

    public string $profileVisibility = 'public'; // Default fallback

    
}
