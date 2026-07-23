<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CommentModel;

class Comments extends UserController
{
    protected $commentModel;

    public function __construct()
    {
        // Initialize the model once for use in all methods
        $this->commentModel = model(commentModel::class);
    }

    public function index()
    {
        $comments = $this->commentModel->getCommentsByUserId($this->userId);

        return $this->renderView('pages/user/comment_activity.php', [
            'appTitle' => setting('App.appName') . " |  Comments's",
            'pageHeader' => "Comment Activity",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => "Your Notes", 'url' => ''],
            ],
            'userId' => null,
            'comments' => $comments,
            'commentCount' => count($comments)
        ]);
    }
}
