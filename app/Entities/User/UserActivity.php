<?php

namespace App\Entities\User;

use CodeIgniter\Entity\Entity;

class UserActivity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
