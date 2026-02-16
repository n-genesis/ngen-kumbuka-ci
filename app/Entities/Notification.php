<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Notification extends Entity
{
    protected $datamap = [];
    protected $dates   = ['updated_at', 'deleted_at'];
    protected $casts   = [
        'id' => 'integer',
    ];

    public function getCreatedAt(): string
    {
        // Access the raw datetime string from the database row
        $rawDate = $this->attributes['created_at'];

        if (empty($rawDate)) {
            return 'Not Published Yet';
        }

        $time = Time::parse($rawDate);
        return $time->humanize();
    }
}
