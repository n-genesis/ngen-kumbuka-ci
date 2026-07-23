<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time; // Recommended for CI4 date handling

class Comment extends Entity
{
    protected $datamap = [];
    protected $dates   = ['updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getCreatedAt(): string
    {
        // Access the raw datetime string from the database row
        $rawDate = $this->attributes['created_at'];

        if (empty($rawDate)) {
            return 'Not Published Yet';
        }

        $time = Time::parse($rawDate);
        return $time->toLocalizedString('MMM d, yyyy'); // e.g., "Oct 27, 2025"
    }
    
}
