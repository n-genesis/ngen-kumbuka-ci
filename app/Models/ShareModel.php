<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Events\Events;
use App\Models\NotificationModel;

class ShareModel extends Model
{
    protected $table = 'shares';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'note_id',
        'sharer_id',
        'owner_id',
        'shared_with_user_id',
        'created_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = '';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = ['createNotification'];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    /**
     * Fetch all posts shared specifically with a given user
     */
    public function getSharedWithUser(int $userId)
    {
        return $this->select('notes.*, shares.can_edit, users.username as author_name')
            ->join('notes', 'notes.id = shares.post_id')
            ->join('users', 'users.id = notes.user_id') // Author of the post
            ->where('shares.shared_with_user_id', $userId)
            ->findAll();
    }
    /**
     * Create a Notification Entry but still try and keep it
     * decoupled by use the NotificationModel and calling it
     * in an afterInsert callback here in the ShareModel
     * 
     * @param array $data
     * @return array
     */
    protected function createNotification(array $data)
    {

        $notifModel = model(NotificationModel::class);

        $notifModel->addNotification(
            $data['data']['note_id'],
            $data['data']['owner_id'],
            $data['data']['sharer_id'],
            'Someone shared your note.',
            'share',
            
        );
        return $data;
    }

    /**
     * Records a share, creates a notification, and triggers an event.
     */
    public function recordShare(int $noteId, int $ownerId, int $sharerId, $sharedWithUserId = null)
    {

        $this->db->transStart();

        // 1. Record the share relationship
        $this->insert([
            'note_id' => $noteId,
            'sharer_id' => $sharerId,
            'owner_id' => $ownerId,
            'shared_with_user_id' => $sharedWithUserId,
        ]);

        // 2. Create the notification record
        // This classes $this->createNotification() method creates a new notification;

        $this->db->transComplete();

        if ($this->db->transStatus() === true) {
            // 3. Fire the real-time push/email event
            Events::trigger('onActivity', $sharerId, $ownerId, $noteId, 'share');
            return true;
        }

        return false;
    }
    /**
     * Check to see if the User already shared the note
     * 
     * @param int $noteId
     * @param int $actorId
     * @return bool
     */
    public function isShared(int $sharerId, int $noteId)
    {
        return $this->select('note_id')
            ->where(['sharer_id' => $sharerId, 'note_id' => $noteId])->countAllResults() > 0;

    }

}
