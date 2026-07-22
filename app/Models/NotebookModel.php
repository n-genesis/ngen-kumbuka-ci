<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\NoteBook as NoteBookEnitiy;

class NotebookModel extends Model
{
    protected $table = 'notebooks';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = NoteBookEnitiy::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'parent_id',
        'name',
        'description',
        'user_id',
        'is_folder',
        'metadata'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [
        'user_id' => 'integer',
    ];
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

    public function getNotebooksByUserId(int $userId)
    {
        return $this->select('notebooks.*')->where('user_id', $userId)->orderBy('notebooks.created_at', 'desc')->findAll();
    }

    /**
     * Get a Users notebook by ID
     * @param int $userId  The user ID of the notebook
     * @param int $notebookId The notebook ID 
     * @return array|object|null
     */
    public function getNotebookById(int $userId, int $notebookId)
    {
        return $this->select('notebooks.*, users.username as author_username, user_details.avatar as author_avatar, user_details.first_name as author_first_name, user_details.last_name as author_last_name')->where('notebooks.id', $notebookId)->where('users.id', $userId)
            ->join('users', 'users.id = notebooks.user_id')
            ->join('user_details', 'user_details.user_id = users.id', 'left')
            ->orderBy('notebooks.created_at', 'desc')
            ->first();
    }

}
