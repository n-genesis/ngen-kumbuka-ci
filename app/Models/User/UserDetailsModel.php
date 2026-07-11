<?php

namespace App\Models\User;

use CodeIgniter\Model;
use App\Entities\User\UserDetails as UserDetailEntity;

class UserDetailsModel extends Model
{
    protected $table = 'user_details';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = UserDetailEntity::class;
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id', 
        'first_name',
        'last_name',
        'bio',
        'organization',
        'address1', 
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'avatar',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getDetailsByUserId($userId){
        return $this->where('user_id', $userId)->first();
    }

    public function getUserAvatarById($userId) {
        return $this->select('avatar')->where('user_id',$userId)->first();
    }
}
