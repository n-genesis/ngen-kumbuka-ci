<?php
declare(strict_types=1);

namespace App\Models\User;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;
use App\Entities\User\User as UserEntity;
/**
 * Admin User Model extending CodeIgniter Shield's UserModel 
 * in additional to returning an extended User Entity.
 * 
 * This model customizes the default user model provided by CodeIgniter Shield
 * to include additional fields and functionalities as needed by the application.
 * 
 * @package    App\Models
 * @author     Andrew Nite <ngendesgin@email.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://n-genesis/github.com/ngen-bootsnippets-ci
 */
 
class UserModel extends ShieldUserModel
{
    protected $returnType  = UserEntity::class;
    protected bool $updateOnlyChanged = true;
    protected $allowedFields = ['username', 'email', 'status'];
    // Dates
    protected $useTimestamps = true;
    
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'first_name',
            'last_name',
        ];
    }

    /**
     * Override findById to include first_name, and last_name with join to user_details table.
     * Note: Shield's auth()->user() uses the findById() method internally.
     */
    public function findById( $id = null): ?UserEntity
    {
        return $this->select('users.*, ud.first_name, ud.last_name, ud.avatar')
                    ->join('user_details ud', 'ud.user_id = users.id', 'left')
                    ->find($id);
    }

    public function findByUsername(string $username){
        return $this->select('users.*, user_details.*')
            ->join('user_details', 'user_details.user_id = users.id', 'left')
            ->join('user_social_links', 'user_social_links.user_id = users.id', 'left')
            ->where('users.username', $username)
            ->first(); // Returns an array of User Entity objects
    }

    public function findByIdWithDetails($id = null): ?UserEntity
    {
        return $this->select('users.*, user_details.*')
            ->join('user_details', 'user_details.user_id = users.id','left')
            ->find($id); // Returns a User Entity object
    }
    
    public function findAllWithDetails()
    {
        return $this->select('users.*, user_details.*')
            ->join('user_details', 'user_details.user_id = users.id','left')
            ->findAll(); // Returns an array of User Entity objects
    }

    /**
     * Override findAll to include custom logic or joins.
     */
    public function findAll($limit = null, int $offset = 0): array
    {
        // Example: Join with the groups table to get group names
        $this->select('users.*, ud.first_name, ud.last_name, ud.avatar')
            ->join('user_details ud', 'ud.user_id = users.id','left');

        // Call the parent findAll method to execute the query
        return parent::findAll($limit, $offset);
    }
    
    // TODO You can also add other custom methods here
    public function findUsersInGroup(string $groupName): array
    {
        return $this->select('users.*')
                    ->join('auth_groups_users agu', 'agu.user_id = users.id')
                    ->join('auth_groups ag', 'ag.id = agu.group_id')
                    ->where('ag.name', $groupName)
                    ->findAll();
    }
    
}
