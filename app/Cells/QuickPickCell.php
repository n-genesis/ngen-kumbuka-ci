<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Models\NoteModel;

class QuickPickCell extends Cell
{
    protected string $theme = 'light';
    protected string $quickPickPage = 'dashboard';
    protected string $path = 'Views/quickpick/';

    protected $noteModel;

    public function mount($quickPickPage)
    {
        $noteModel = model(NoteModel::class);
        $this->quickPickPage = $quickPickPage ?? $this->quickPickPage;
    }
    public function render(): string
    {
        return view($this->path . $this->quickPickPage, [
            'userNotes' => [
                'o'=> "skdlmnsdlkmsdkmdglkm",
            ],
        ]);
    }
}
