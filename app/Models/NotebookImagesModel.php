<?php

namespace App\Models;

use CodeIgniter\Model;

class NotebookImagesModel extends Model
{
    protected $table            = 'notebook_images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'notebook_id',
        'image_path',
        'image_name',
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

    public function getNotebookImagesByNotebookId(int $notebookId)
    {
        return $this->select('notebook_images.*')->where('notebook_id', $notebookId)->first();
    }

    public function saveImage(int $notebookId, string $imagePath)
    {
        $data = [
            'notebook_id' => $notebookId,
            'image_path'  => $imagePath
        ];

        // Check if the record already exists for this notebook_id
        if ($this->where('notebook_id', $notebookId)->find()) {
            // Update the existing row
            return $this->where('notebook_id', $notebookId)->set($data)->update();
        }

        // Insert a brand new row
        return $this->insert($data);
    }

}
