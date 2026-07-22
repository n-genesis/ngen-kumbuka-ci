<?php

namespace App\Entities\User;

use App\Models\FollowerModel;
use App\Models\User\UserSocialLinksModel;
use CodeIgniter\Shield\Entities\User as ShieldUserEntity;
use Config\UserSettings as userConfig;
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
 * @link       https://github.com/n-genesis/ngen-kumbuka-ci
 * 
 */
class User extends ShieldUserEntity
{
    protected $datamap = [
        'first_name' => 'first_name',
        'last_name' => 'last_name',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
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
    public function getIsSuperAdmin(): bool
    {
        return $this->inGroup('superadmin');
    }

    /**
     * Get highest User Group
     */
    public function getUserGroup() {
        // 1. Define your hierarchy from highest permission to lowest
        $groupPriority = ['admin', 'moderator', 'developer', 'user'];

        // 2. Fetch all groups assigned to this user (e.g., ['user', 'admin'])
        $userGroups = $this->getGroups();

        // 3. Find matches and keep the original priority order
        $matchedGroups = array_intersect($groupPriority, $userGroups);

        // 4. Extract the highest group (the first element in the matched array)
        $highestGroup = reset($matchedGroups); // Returns 'admin'

        return ucfirst($highestGroup);
    }

    public function getAvatar(): string
    {
        // Use Default avatart image in User Config file User's not set
        $userConfig = config(userConfig::class);

        $avatar = $this->attributes['avatar'];

        return $avatar ?? $userConfig->defaultAvatar;
    }

    public function getCoverImage(): string
    {
        // Use Default avatart image in User Config file User's not set
        $userConfig = config(userConfig::class);

        $avatar = $this->attributes['cover_image'];

        return $avatar ?? $userConfig->defaultCoverImage;
    }

    public function getUserSocialLink(string $title = '')
    {
        $link = '';

        // Caches the detail record so it only queries once per instance
        if (!isset($this->attributes['user_social_links'])) {
            $link = model(UserSocialLinksModel::class)->where(['user_id' => $this->user_id, 'title' => $title])->first();
        }
        return $link;
    }

    

    public function getHasSocialLinks(){
        $socialLinks = model(UserSocialLinksModel::class);
        if($socialLinks->where(['user_id' => $this->user_id])->first()){
            return true;
        }

        return false;
    }

    /**
     * Get all users following this user
     * Accessible via $user->followers
     */
    public function getFollowers()
    {
        $model = model(FollowerModel::class);
        
        // Join with the users table to get full user objects
        return $model->select('users.*')
                     ->join('users', 'users.id = followers.follower_id')
                     ->where('followed_id', $this->attributes['id'])
                     ->findAll();
    }

    /**
     * Get all users this user is following
     * Accessible via $user->following
     */
    public function getFollowing()
    {
        $model = model(FollowerModel::class);
        
        return $model->select('users.*')
                     ->join('users', 'users.id = followers.followed_id')
                     ->where('follower_id', $this->attributes['id'])
                     ->findAll();
    }
}
