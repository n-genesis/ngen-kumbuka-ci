<?php

namespace Config\AppConfig;

use CodeIgniter\Config\BaseConfig;

class User extends BaseConfig
{
    /**
     * Default avart iamge
     * @var string
     */
    public string $defaultAvatar = '/uploads/default-avatar.jpg';
}
