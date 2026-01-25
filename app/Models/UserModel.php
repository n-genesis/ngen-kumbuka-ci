<?php
declare(strict_types=1);
/**
 * User Model extending CodeIgniter Shield's UserModel
 * 
 * This model customizes the default user model provided by CodeIgniter Shield
 * to include additional fields and functionalities as needed by the application.
 * 
 * @package    App\Models
 * @author     Andrew Nite <ngendesign@email.com>
 */
namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;
use App\Entities\User as UserEntity;

class UserModel extends ShieldUserModel
{
    protected $returnType  = UserEntity::class;
    
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
        return $this->select('users.*, ud.first_name, ud.last_name')
                    ->join('user_details ud', 'ud.user_id = users.id', 'left')
                    ->find($id);
    }
    
    public function findAllWithDetails()
    {
        return $this->select('users.*, user_details.*')
            ->join('user_details', 'user_details.user_id = users.id','left')
            ->findAll(); // Returns an array of User Entity objects
    }
}
