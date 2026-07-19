<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Note as NoteEntity;

class NoteModel extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = NoteEntity::class;
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id',
        'slug',
        'title',
        'priority',
        'body',
        'sticker',
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
    protected $beforeInsert = ['generateSlug'];
    protected $afterInsert = [];
    protected $beforeUpdate = ['generateSlug'];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
    protected $priorities = [
        'primary' => 'Default (Primary)',
        'success' => 'Very High (Success)',
        'secondary' => 'Very Low (Secondary)',
        'info' => 'Low (Information)',
        'warning' => 'Medium (Warning)',
        'danger' => 'High (Danger)',
    ];

    /**
     * Generate a slug from the title
     * Seemed easiest/best to put the mechanics here
     * @param array $data
     * @return array
     */
    protected function generateSlug(array $data)
    {
        if (isset($data['data']['title'])) {
            // Retrieve the ID(s) being updated
            // It is typically an array of IDs: [0 => 123]
            if (isset($data['id'])) {
                $id = is_array($data['id']) ? $data['id'][0] : $data['id'];
            } else {
                $id = null;
            }
            helper('url');
            $baseSlug = mb_url_title($data['data']['title'], '-', true);
            $slug = $baseSlug;
            $count = 1;

            // Check for uniqueness in the database
            // Does the slug exist and NOT the current row being updated 
            while ($this->where('id !=', $id)->where('slug', $slug)->first()) {
                $slug = $baseSlug . '-' . $count++;
            }

            $data['data']['slug'] = $slug;
        }
        return $data;
    }
    /**
     * Get a list of User Notes using user_id, $typeSlug, and or supplying a $limit
     * 
     * @param int $userId
     * @param mixed $limit
     * @return array
     */
    public function getNotesByUserId(int $userId, string $typeSlug = '', ?int $limit = null)
    {

        $builder = $this->select('notes.*, note_types.name as type_name, note_types.slug as type_slug, note_types.btn_icon')
            ->join('note_types', 'note_types.id = notes.type_id')
            ->where('notes.user_id', $userId);

        if ($typeSlug) {
            $builder->where('note_types.slug', $typeSlug);
        }

        $builder->orderBy('notes.created_at', 'DESC');

        if ($limit !== null) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }

    public function getNoteById(int $id)
    {
        return $this->select('notes.*, note_types.name as type_name, note_types.slug as type_slug, note_types.btn_icon, users.username as author_username, user_details.avatar as author_avatar, user_details.first_name as author_first_name, user_details.last_name as author_last_name')
            ->join('note_types', 'note_types.id = notes.type_id')
            ->join('users', 'users.id = notes.user_id')
            ->join('user_details', 'user_details.user_id = users.id', 'left')
            ->where('notes.id', $id)
            ->first();
    }

    public function getNoteBySlug(int $userId, string $slug)
    {
        return $this->select('notes.*, note_types.name as type_name, note_types.slug as type_slug, note_types.btn_icon, users.username as author_username, user_details.avatar as author_avatar, user_details.first_name as author_first_name, user_details.last_name as author_last_name')
            ->join('note_types', 'note_types.id = notes.type_id')
            ->join('users', 'users.id = notes.user_id')
            ->join('user_details', 'user_details.user_id = users.id', 'left')
            ->where('notes.user_id', $userId)
            ->where('notes.slug', $slug)
            ->first();
    }

    public function getNoteSharesCount(int $noteId)
    {
        return $this->db->table('shares')
            ->select('users.username, shares.created_at')
            ->where('note_id', $noteId)
            ->countAllResults();
    }
    /**
     * Summary of getNotePriority
     * @return mixed
     */
    public function getNotePriority($column)
    {

        return $this->priorities;
    }

    /**
     * Create a new notification for all Following Users with notifications
     * settings turned on.
     * 
     * @return void
     */
    public function notifyFollowingUsers(){

    }

}
