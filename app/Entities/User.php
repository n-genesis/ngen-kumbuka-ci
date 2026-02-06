<?php

namespace App\Entities;

use App\Models\User\UserSocialLinksModel;
use CodeIgniter\Shield\Entities\User as ShieldUserEntity;
use Config\AppConfig\User as userConfig;
use CodeIgniter\I18n\Time; // Recommended for CI4 date handling

/**
 * User Entity extending CodeIgniter Shield's User Entity
 * 
 * This entity customizes the default user entity provided by CodeIgniter Shield
 * to include additional fields and functionalities as needed by the application.
 * 
 * @package    App\Entities
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-bootsnippets-ci
 * 
 */
class User extends ShieldUserEntity
{
    protected $datamap = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'avatar' => 'string',
    ];

    /**
     * Custom logic to get a full name.
     * Assumes 'first_name' and 'last_name' are added to the users table.
     * is first and last name are empty, returns the username instead.
     */
    protected function getFullName(): string
    {
        $first = $this->attributes['first_name'];
        $last = $this->attributes['last_name'];
        $fullname = $first . ' ' . $last;

        $fullname = $fullname ?? $this->attributes['username'];

        return $fullname;



    }
    public function getUserLastActive(): string
    {
        // Access the raw datetime string from the database row
        $rawDate = $this->attributes['last_active'];

        if (empty($rawDate)) {
            return 'Not Published Yet';
        }

        $time = Time::parse($rawDate);
        return $time->toLocalizedString('MMM d, yyyy'); // e.g., "Oct 27, 2025"
    }
    /**
     * Custom logic to check if a user is an admin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->inGroup('superadmin');
    }

    public function getAvatar(): string
    {
        // Use Default avatart image in User Config file User's not set
        $userConfig = config(userConfig::class);

        $avatar = $this->attributes['avatar'];

        return $avatar ?? $userConfig->defaultAvatar;
    }

    public function getUserSocialLinks(string $title = null)
    {
        $link = '';

        // Caches the detail record so it only queries once per instance
        if (!isset($this->attributes['user_social_links'])) {
            $link = model(UserSocialLinksModel::class)->where(['user_id' => $this->id, 'title' => $title])->first();
        }
        return $link;
    }
}
