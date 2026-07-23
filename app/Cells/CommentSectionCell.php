<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Models\CommentModel;

class CommentSectionCell extends Cell
{
    public $noteId; // This property is automatically filled from the view_cell() call
    protected $comments;
    protected $numComments;

    public function mount()
    {
        
        
        $model = model(CommentModel::class);
        // Fetch users who follow the given userId
        $this->comments = $model->getCommentsByNoteId($this->noteId, 'note');
        $this->numComments = $model->getNumOfCommentsById($this->noteId, 'note');

    }

    // Properties/Methods are automatically available in the view
    public function getCommentsProperty()
    {
        return $this->comments;
    }

    public function getNumCommentsProperty(){
        return $this->numComments;
    }
}
