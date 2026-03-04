<?php

namespace App\Controllers;

use App\Controllers\UserController;
use App\Models\User\UserModel;
use App\Models\ShareModel;
use App\Models\NoteModel;
use CodeIgniter\HTTP\ResponseInterface;

class ShareController extends UserController
{
    protected ShareModel $shareModel;
    protected UserModel $userModel;

    public function __construct()
    {
        $this->shareModel = model(ShareModel::class);
        $this->userModel = model(UserModel::class);
    }
    public function index()
    {
        //
    }

    // app/Controllers/ShareController.php
    public function share()
    {
        // Ensure this is a POST request (CSRF check happens automatically if enabled)
        // if ($this->request->getPost()) {
        //     return redirect()->back()->with('error', 'Unable to share note.');
        // }
        $note_id = $this->request->getPost('note_id');
        $recipient_id = $this->request->getPost('user_id');

        // 1. Logic to save share in DB
        $this->shareModel->insert([
            'note_id' => $note_id,
            'shared_with_user_id' => $recipient_id
        ]);

        // 2. Fetch recipient details for the event
        $recipient = $this->userModel->find($recipient_id);

        if (!$recipient) {
            return redirect()->back()->with('error', 'Unable to share note.');
        }

        $noteModel = model(NoteModel::class);
        $noteModel->find($note_id);


        return redirect()->to('/dashboard')->with('message', 'Post shared successfully!');
    }


    /**
     * Store when a User Shares a Note
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function shareNote()
    {
        $noteId = $this->request->getPost('note_id');
        $ownerId = $this->request->getPost('user_id');

        $shareModel = model(ShareModel::class);

        $rules = [
            'note_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];

        // Simple Validations
        if (
            !$this->validateData([
                'note_id' => $noteId,
                'user_id' => $ownerId
            ], $rules)
        ) {
            // Handle failure (e.g., return to form with errors)
            // Custom message instead of $this->validator->getErrors()
            return redirect()->back()->with('errors', 'This note can\'t be share right now.');
        }

        // Check is User already shared the note
        if ($shareModel->hasShared($this->userId, $noteId)) {
            return redirect()->back()->with('message', 'You have already shared this note.');
        }

        if ($shareModel->recordShare($noteId, $ownerId, $this->userId)) {
            return redirect()->back()->with('message', 'You\'ve shared the note successfully!');
        }

        return redirect()->back()->with('error', 'Unale to share note. Please try again later.');

    }

    /**
     * AJAX Method to handle ShareController features
     * 
     * @return ResponseInterface|\CodeIgniter\HTTP\RedirectResponse
     */
    public function shareNoteAjax()
    {
        if ($this->request->isAJAX()) {

            $token = [
                'csrf_token' => csrf_hash(),
            ];

            $noteId = $this->request->getPost('note_id');
            $ownerId = $this->request->getPost('user_id');

            $shareModel = model(ShareModel::class);

            $rules = [
                'note_id' => 'required|integer',
                'user_id' => 'required|integer',
            ];

            // Simple Validations
            if (
                !$this->validateData([
                    'note_id' => $noteId,
                    'user_id' => $ownerId
                ], $rules)
            ) {
                return $this->response->setJSON(array_merge($token,[
                    'status' => 'error',
                    'message' => 'This note can\'t be share right now.'
                ]));
            }

            // Check is User already shared the note
            if ($this->shareModel->hasShared($this->userId, $noteId)) {
                return $this->response->setJSON(array_merge($token,[
                    'status' => 'success',
                    'message' => 'You have already shared this note.'
                ]));
            }

            if ($shareModel->recordShare($noteId, $ownerId, $this->userId)) {

                return $this->response->setJSON(array_merge($token,[
                    'status' => 'success',
                    'message' => 'You\'ve shared the note successfully!'
                ]));

            } else {

                return $this->response->setJSON(array_merge($token,[
                    'status' => 'error',
                    'message' => 'Unale to share note. Please try again later.'
                ]));

            }


        }
        return redirect()->to('/');
    }


}
