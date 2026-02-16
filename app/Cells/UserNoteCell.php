<?php

namespace App\Cells;

use App\Models\NoteModel;
use CodeIgniter\View\Cells\Cell;

class UserNoteCell extends Cell
{
    protected $note;
    protected $noteId;

    // You can pass data to the cell via properties
    public function mount(int $userId)
    {
        $model = model(NoteModel::class);
        // Fetch the note and its author info
        $this->note = $model->getNotesByUserId($userId);
    }
    public function render(): string
    {
        return view('App\Views\partials\note\note_card_v1', [
            'userNotes' => $this->note,
        ]);
    }
}

