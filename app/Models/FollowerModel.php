<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Follower as FollowerEntity;

class FollowerModel extends Model
{
    protected $table = 'followers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = FollowerEntity::class;
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
     * @param bool $acceptedOnly If true, only considers accepted follow relationships
     * 
     * @return bool Returns true if the follower is following the followed user, false otherwise
     */
    public function isFollowing($followerId, $followedId, $acceptedOnly = false)
    {
        $query = $this->where([
            'follower_id' => $followerId,
            'followed_id' => $followedId, 
        ]);

        // If $acceptedOnly is true, only consider relationships with status 'accepted'
        if ($acceptedOnly) {
            $query->where('status', 'accepted')
            ->where('status !=', 'blocked');
        } else {
            $query->whereIn('status', ['pending', 'accepted'])
            ->where('status !=', 'blocked');
        }

        $result = $query->first() ? true : false; // Returns true if a follow relationship exists, false otherwise

        // echo "Checking follow status: Follower ID = $followerId, Followed ID = $followedId, Accepted Only = " . ($acceptedOnly ? 'Yes' : 'No') . " Record Found = " . ($result ? 'Yes' : 'No') . "\n";
        // exit;

        return $result;
    }

    /**
     * Check if the Current loggined in User has blocked the $followdId User
     * 
     * @param mixed $followerId The ID of the user who is blocking
     * @param mixed $followedId The ID of the user being blocked
     * 
     * @return bool Returns true if the follower has blocked the followed user, false otherwise
     */
    public function isBlocked($followerId, $followedId)
    {
        $query = $this->where([
            'follower_id' => $followerId,
            'followed_id' => $followedId,
            'status' => 'blocked',
        ])->first();

        $query = $query ? true : false; // Returns true if a blocked relationship exists, false otherwise

        return $query;
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
    /**
     * Get current User Followers by User ID
     * 
     * @param mixed $userId The ID of the user whose followers we want to retrieve
     * @return array Returns an array of followers, each containing the follower's username, avatar, and the date they started following
     */
    public function getFollowing($userId)
    {
        return $this->select('users.username, user_details.avatar, followers.created_at')
            ->join('users', 'users.id = followers.followed_id')
            ->join('user_details', 'user_details.user_id = followers.followed_id')
            ->where('followers.follower_id', $userId)
            ->where('followers.status', 'accepted')// Only get accepted followers
            ->orderBy('followers.created_at', 'DESC')
            ->findAll();
    }
}
