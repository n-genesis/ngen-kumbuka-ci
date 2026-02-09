<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time; // Recommended for CI4 date handling

/**
 * User Note Entity
 * 
 * This class create and entity for the notes table 
 * 
 * @package    App\Entities
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-bootsnippets-ci
 * 
 */
class Note extends Entity
{
    protected $attributes = [
        'title',
        'slug',
        'body'
    ];
    protected $datamap = [];
    protected $dates   = ['updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getCreatedAt(): string
    {
        // Access the raw datetime string from the database row
        $rawDate = $this->attributes['created_at'];
        // 1. Convert the raw database value to a Time instance
        $time = $this->mutateDate($rawDate);

        // 2. Format it using PHP's date format characters:
        // 'M' = Short month (Feb)
        // 'jS' = Day without leading zero + ordinal suffix (3rd)
        // 'Y' = 4-digit year (2025)
        return $time->format('M jS, Y');
    }
}
