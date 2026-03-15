<?php

namespace App\Models;

use CodeIgniter\Model;

class FollowerModel extends Model
{
    protected $table = 'followers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'follower_id',
        'followed_id',
        'status',
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

    /**
     * Check if the Current loggined in User if already follwing the $followdId User
     * 
     * @param mixed $followerId The ID of the user who is following
     * @param mixed $followedId The ID of the user being followed
     * @return bool Returns true if the follower is following the followed user, false otherwise
     */
    public function isFollowing($followerId, $followedId)
    {
        return $this->where([
            'follower_id' => $followerId,
            'followed_id' => $followedId
        ])->first() !== null;
    }

    /**
     * Inserts or Deletes a follow relationship based on its current state (Follow/Unfollow)
     * and returns a string indicating the action taken ('followed' or 'unfollowed')
     *  
     * @param mixed $followerId The ID of the user who is following
     * @param mixed $followedId The ID of the user being followed
     * @return string Returns 'followed' if the user was followed, 'unfollowed' if the user was unfollowed
     */
    public function toggleFollow($followerId, $followedId)
    {
        $condition = [
            'follower_id' => $followerId,
            'followed_id' => $followedId,
        ];

        // Check if the relationship exists
        $existing = $this->where($condition)->first();

        if ($existing) {
            // If it exists, delete it (Unfollow)
            $this->where($condition)->delete();
            return 'unfollowed';
        } else {
            // If it doesn't exist, insert it (Follow)
            $this->insert($condition);
            return 'followed';
        }
    }
}
