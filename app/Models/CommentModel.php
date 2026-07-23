<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
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
    protected $useTimestamps = false;
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
    protected $afterInsert    = [];
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
}
