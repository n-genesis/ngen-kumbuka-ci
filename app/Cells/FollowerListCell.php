<?php
namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Models\FollowerModel;

class FollowerListCell extends Cell
{
    public $userId; // This property is automatically filled from the view_cell() call
    protected $followers;

    public function mount()
    {
        $model = model(FollowerModel::class);
        // Fetch users who follow the given userId
        $this->followers = $model->getFollowing($this->userId);
    }

    // Properties/Methods are automatically available in the view
    public function getFollowersProperty()
    {
        return $this->followers;
    }
}
