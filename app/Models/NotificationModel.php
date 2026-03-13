<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Notification as NotificationEntity;

class NotificationModel extends Model
{
    protected $table            = 'notifications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = NotificationEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
    'recipient_id', 
    'actor_id', 
    'source_id', 
    'source_type', 
    'message', 
    'is_read'
];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [
        'id'=> 'int',
    ];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    /**
     * Add a new Notification entry in to the database
     * 
     * @param int $noteId
     * @param int $ownerId
     * @param int $sharerId
     * @param string $message
     * @param string $type
     * @return bool|int|string
     */
    public function addNotification(int $noteId, int $ownerId, int $sharerId, string $message, string $type = 'share') {
        return $this->insert([
            'recipient_id' => $ownerId,
            'actor_id'     => $sharerId,
            'source_id'    => $noteId,
            'source_type'  => $type,
            'message'      => $message,
            'is_read' => 0
        ]);
    }

    public function getUnreadCountbyUserId(int $userId) {
        return $this->where('recipient_id', $userId)
                    ->where('is_read', 0)
                    ->countAllResults(); // Returns integer
    }

    public function getNotificationsByUserId(int $userId) {
        return $this->where('recipient_id', $userId)
                    ->orderBy('created_at', 'DESC');
    }
    
}
