<?php
/**
 * Note Cell
 * 
 * This Cell is shared accross controllers and Cells
 * to try and kept the handeling and HTML style simple 
 * 
 * @package    App\Cells
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-kumbuka-ci
 */
namespace App\Cells;

use App\Models\NoteModel;
use CodeIgniter\View\Cells\Cell;

class UserNoteCell extends Cell
{
    protected $note;

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

