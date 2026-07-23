<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Comment as CommentEntity;

class CommentModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = CommentEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'entity_id',
        'entity_type',
        'parent_comment_id',
        'body',
        'status',// approved, pending, spam
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['createNotification'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getCommentsByNoteId(int $entityId, string $entityType){
        return $this->select('comments.*, users.username as author_username, user_details.avatar as author_avatar, user_details.first_name as author_first_name, user_details.last_name as author_last_name')
            ->join('users', 'users.id = comments.user_id')
            ->join('user_details', 'user_details.user_id = users.id', 'left')
            ->where('entity_id',$entityId)
            ->where('entity_type', $entityType)
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }

    public function getNumOfCommentsById(int $entityId, string $entityType): int{
        return $this->select('entity_id')->where(['entity_id' => $entityId, 'entity_type' => $entityType])->countAllResults();
    }

    public function getCommentsByUserId(int $userId) {
        return $this->select('comments.*, notes.user_id as owner_id, users.username as author_username, user_details.avatar as author_avatar, user_details.first_name as author_first_name, user_details.last_name as author_last_name')
        ->join('users', 'users.id = comments.user_id')
        ->join('user_details', 'user_details.user_id = users.id', 'left')
        ->join('notes','notes.id = comments.entity_id')
        ->where('notes.user_id',$userId)
        ->orderBy('comments.created_at', 'DESC')
        ->findAll();
    }

    /**
     * Callback Method
     * This receives $eventData automatically from CodeIgniter's event pipeline
     */
    protected function createNotification(array $eventData): array
    {
        // Ensure the insertion succeeded and gave us an ID
        if (!$eventData['result']) {
            return $eventData;
        }

        // Extract the form data arrays passed during the insert() execution
        $submittedData = $eventData['data'];
        $userId = auth()->user()->id ?? null; // Capture the user ID from the data array

        // Get the User's ID of Note post
        $noteModel = model(NoteModel::class);
        $note = $noteModel->getNoteById($submittedData['entity_id']);

        if ($userId) {
            $notifModel = model(NotificationModel::class);

            $notifModel->addNotification(
                $submittedData['entity_id'],
                $note->user_id,
                $userId,
                'Someone commented on your note.',
                'comment',
                
            );
        }

        // Always return the original event data array so the pipeline can finish cleanly
        return $eventData;
    }
}
