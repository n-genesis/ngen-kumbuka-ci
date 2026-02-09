<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Note as NoteEntity;

class NoteModel extends Model
{
    protected $table            = 'notes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = NoteEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'slug',
        'title',
        'priority',
        'body',
        'allowed_comments',
        'pinned',
        'notebook_id',
        'status',
        'type_id',
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
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Get a list of User Notes using user_id, $typeSlug, and or supplying a $limit
     * 
     * @param int $userId
     * @param mixed $limit
     * @return array
     */
    public function getNotesByUser(int $userId, string $typeSlug, ?int $limit = null) {

        $builder = $this->select('notes.*, note_types.name as type_name, note_types.slug as type_slug, note_types.btn_icon')
                    ->join('note_types', 'note_types.id = notes.type_id')
                    ->where('notes.user_id', $userId);
        
        if($typeSlug) {
            $builder->where('note_types.slug', $typeSlug);
        }

        $builder->orderBy('notes.created_at', 'DESC');

        if($limit !== null) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }
}
