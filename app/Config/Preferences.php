<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
/**
 * Config File used the Tatter\Preferences package
 * 
 * A Persistent user-specific settings for CodeIgniter 4
 * @link https://github.com/tattersoftware/codeigniter4-preferences
 */
class Preferences extends BaseConfig
{
    /**
     * Slug for the current user theme.
     */
    public bool $accountPrivacy = false;
}