<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteImagesModel extends Model
{
    protected $table            = 'note_images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 
        'file_path', 
        'file_name', 
        'file_size',
        'sort_order',
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

    public function getImagesByUserId(int $userId)
    {
        return $this->select('note_images.*')->where('user_id', $userId)->findAll();
    }

    public function getImagesByNoteId(int $noteId)
    {
        return $this->select('note_images.*')
                    ->join('note_image_links', 'note_image_links.image_id = note_images.id')
                    ->where('note_image_links.note_id', $noteId)
                    ->findAll();
    }

    public function getImageById(int $imageId)
    {
        return $this->select('note_images.*')->where('id', $imageId)->first();
    }
}
