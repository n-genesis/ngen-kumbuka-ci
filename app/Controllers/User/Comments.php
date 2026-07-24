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

    public function delete(int $commentId){
        // Check if AJAX
        if(!$this->request->isAJAX()){
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Direct script access is not allowed.',
                'token'   => csrf_hash()
            ])->setStatusCode(403);
        }

        $comment = $this->commentModel->getCommentById($commentId);

        // echo '<pre>';
        // var_dump($comment);
        // echo '</pre>';
        // exit;

        if(!$comment || $comment->note_author_user_id != $this->userId){
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => "Comment not found or you're Unauthorized delete this comment ",
                'token'   => csrf_hash() // Always include fresh token on failure
            ])->setStatusCode(422);
        }

        if($this->commentModel->deleteComment($commentId)){
            return $this->response->setJSON([
                'status'   => 'success',
                'message'  => 'Comment deleted successfully!',
                'token'   => csrf_hash() // Always include fresh token on failure
            ])->setStatusCode(201);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Unable to save your comment due to a server issue. Please try again.',
            'token'   => csrf_hash()
        ])->setStatusCode(500);


    }

}
