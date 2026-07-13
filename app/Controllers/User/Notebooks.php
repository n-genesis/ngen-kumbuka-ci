<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NotebookModel;


class Notebooks extends UserController
{
    public function index($userId = null)
    {
        if ($userId === null) {
            return redirect()->to('home')->with('error', 'User ID is required.');
        }
        $notebookModel = model(NotebookModel::class);

        return $this->renderView('pages/notebooks/index', [
            'appTitle' => setting('App.appName') . ' | Your Notebooks',
            'pageHeader' => 'Your Notebooks',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'User Notebooks', 'url' => ''],
            ],
            'userId' => $userId,
            'userNotebooks' => $notebookModel->getNotebooksByUserId($userId),
        ]);
    }

    public function new($notebookId = null)
    {
        $userId = auth()->id();

        return $this->renderView('pages/notebooks/new', [
            'appTitle' => setting('App.appName') . ' | Your Notebooks',
            'pageHeader' => 'New Notebooks',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'Notebooks', 'url' => site_url('users/'.$userId.'/notebooks')],
                ['label' => 'New Notebooks', 'url' => ''],
            ],
            'userId' => $userId,
        ]);
    }
    
    public function create(){
        echo 'Hello World';
    }

    // PUT or PATCH /notebooks/{id}
    public function update($id = null)
    {
        // Get the current logged-in user's ID via Shield
        $currentUserId = auth()->id();

        // Get Notebook model
        $notebookModel = model(NotebookModel::class);

        // Verify this notebook exists AND belongs to this user
        $notebook = $notebookModel->getNotebookById($currentUserId, $id);

        if (!$notebook) {
            // Return error message if notebook is accessed by unauthorized users
            return redirect()->back()->with('error', 'Doesn\'t look like you\'re unauthorized to open this notebook.');
        }

        // Extract the update payload safely (supports PUT/PATCH content types)
        $data = $this->request->getRawInput();

        // Prevent malicious payload injection 
        // Ensure they cannot change the owner or the notebook ID itself
        unset($data['user_id']);
        unset($data['id']);

        // 5. Update the database and respond
        if ($notebookModel->update($id, $data)) {
            return redirect()->back()->with('message', 'Notebook updated successfully');
        }

        // Return validation errors if the model rules fail
        return redirect()->back()->with('errors', $notebookModel->errors());
    }


    public function edit($notebookId = null)
    {
        $userId = auth()->id();

        $notebookModel = model(NotebookModel::class);
        $notebook = $notebookModel->getNotebookById($userId, $notebookId);

        if (!$notebook || $notebook->user_id != $userId) {
            return redirect()->to('home')->with('error', 'You\'re don\'t have permission to edit the folder');
        }

        return $this->renderView('pages/notebooks/edit', [
            'appTitle' => setting('App.appName') . ' | Your Notebooks',
            'pageHeader' => 'Your Notebooks',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'Notebooks', 'url' => site_url('users/'.$userId.'/notebooks')],
                ['label' => 'Edit Notebooks', 'url' => ''],
            ],
            'userId' => $userId,
            'notebook' => $notebook,
        ]);
    }
}
