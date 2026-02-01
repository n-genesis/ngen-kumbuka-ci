<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time; // Recommended for CI4 date handling
use Config\AppConfig\User;

/**
 * User Details Entity
 * 
 * This entity represents additional User detials retrieved from the user_details table.
 * 
 * @package    App\Entities
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-bootsnippets-ci
 * 
 */

class UserDetails extends Entity
{

    protected $attributes = [
        'user_id' => null,
        'avatar' => null,
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getBirthday(): string
    {
        // Access the raw datetime string from the database row
        $rawDate = $this->attributes['birthday'];

        if (empty($rawDate)) {
            return 'Not Published Yet';
        }

        // Method 1: Using CodeIgniter's Time library (Recommended)
        // Since it's in $dates, it might already be a Time object, but accessing 
        // the attribute directly guarantees the underlying value.
        $time = Time::parse($rawDate);
        return $time->toLocalizedString('m/d/Y'); // e.g., "Oct 27, 2025"

        // Method 2: Using standard PHP date function
        // return date('F j, Y, g:i a', strtotime($rawDate)); // e.g., "October 27, 2025, 4:20 pm"
    }

}
