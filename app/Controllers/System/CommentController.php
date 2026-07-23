<?php

namespace App\Controllers\System;

use App\Models\CommentModel;
use App\Models\User\UserModel;
use CodeIgniter\RESTful\ResourceController;

class CommentController extends ResourceController
{
    protected $format = 'json';

    public function store()
    {
        // Enforce AJAX check
        if (!$this->request->isAJAX()) {
            return $this->respond([
                'status'  => 'error',
                'message' => 'Direct script access is not allowed.',
                'token'   => csrf_hash()
            ], 403);
        }

        // Define validation rules
        $rules = [
            'entity_id' => 'required|integer',
            'body'       => 'required|min_length[5]',
        ];

        // Define custom validation error messages
        $messages = [
            'body' => [
                'required'   => 'The comment section cannot be blank.',
                'min_length' => 'Your comment must be at least 5 characters long.'
            ]
        ];

        // Check validation
        if (!$this->validate($rules, $messages)) {
            // Flatten errors into a single clean string block or return the raw array
            $errors = implode(' ', $this->validator->getErrors());

            return $this->respond([
                'status'  => 'error',
                'message' => $errors,
                'token'   => csrf_hash() // Always include fresh token on failure
            ], 422);
        }

        $noteId = $this->request->getPost('entity_id');

        $userId = auth()->user()->id;
        $userModel = model(UserModel::class);
        $user = $userModel->findById($userId);

        // Process Database insertion
        $commentModel = model(CommentModel::class);

        $data = [
            'entity_id' => $noteId,
            'entity_type' => 'note',
            'user_id'   => $userId,
            'body'       => $this->request->getPost('body'),
            'status'    => 'approved',
        ];
        // Trigger NotificationModel Callback in CommentModel
        if ($commentModel->insert($data)) {
            return $this->respond([
                'status'   => 'success',
                'message'  => 'Comment posted successfully!',
                'fullname' => $user->fullname,
                'avatar'   => base_url($user->avatar),
                'body'     => esc($data['body']),
                'commentCount' => $commentModel->getNumOfCommentsById($noteId, 'note'),
                'token'    => csrf_hash() // Fresh token for next submission
            ], 201);
        }

        // Database failure backup
        return $this->respond([
            'status'  => 'error',
            'message' => 'Unable to save your comment due to a server issue. Please try again.',
            'token'   => csrf_hash()
        ], 500);
    }
}
