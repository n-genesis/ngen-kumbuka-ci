<?php

namespace App\Entities;

use CodeIgniter\Shield\Entities\User as ShieldUserEntity;

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
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'first_name' => 'string',
        'last_name'  => 'string',
    ];

    /**
     * Example: Custom logic to get a full name.
     * Assumes 'first_name' and 'last_name' are added to the users table.
     */
    protected function getFullName()
    {
        $first = $this->attributes['first_name'] ?? '';
        $last  = $this->attributes['last_name'] ?? '';
        $full  = trim($first . ' ' . $last);    

        if(!empty($first) && !empty($last)) {
            return $full;
            
        } else {
            return $this->attributes['username'] ;
        }

    }

    /**
     * Example: Custom logic to check if a user is an admin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->inGroup('superadmin');
    }
}
