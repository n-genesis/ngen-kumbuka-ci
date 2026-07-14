<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User\UserDetailsModel;
use App\Models\NotebookModel;
use App\Models\NotebookImagesModel;
use Config\App;

class Notebooks extends UserController
{
    protected $notebookImagesModel;

    public function __construct() {
        $this->notebookImagesModel = model(NotebookImagesModel::class);
    }

    public function index($userId = null)
    {

        if ($userId === null) {
            return redirect()->to('home')->with('error', 'User ID is required.');
        }

        $user = model(UserDetailsModel::class)->find($userId);

        $notebookModel = model(NotebookModel::class);
        $notebooks = $notebookModel->getNotebooksByUserId($userId);

        return $this->renderView('pages/notebooks/index', [
            'appTitle' => setting('App.appName') . ' | Your Notebooks',
            'pageHeader' => "$user->first_name $user->last_name's Notebooks",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => "$user->first_name $user->last_name's Notebooks", 'url' => ''],
            ],
            'userId' => $userId,
            'userNotebooks' => $notebooks,
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

    public function uploadImage()
    {
        
        $validationRule = [
            'notebook-image' => [
                'label' => 'File',
                'rules' => [
                    'uploaded[notebook-image]',
                    'is_image[notebook-image]',
                    'mime_in[notebook-image,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[notebook-image,2048]', // 2MB max limit
                    'max_dims[notebook-image,max_width,1080,max_height,1080,min_width,1080,min_height,1080]',
                ],
                'errors' => [
                    'uploaded' => 'Please select an image to upload.',
                    'is_image' => 'The file must be a valid image.',
                    'mime_in'  => 'Only JPG, JPEG, PNG, and WebP images are allowed.',
                    'max_size' => 'The image size cannot exceed 2MB.',
                    'max_dims'      => 'The image must be exactly 1080x1080 pixels.',
                ],
            ],
        ];
        if (!$this->validate($validationRule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('notebook-image');
        $notebookId = $this->request->getPost('notebook_id');

        if ($img->isValid() && !$img->hasMoved()) {
            $appConfig = config(App::class);
            // Path Substring replace %username% See Config App.php
            $dirHash = md5($this->username.'|'.$this->userId);
            $imagePath = str_replace('%username%', $dirHash, $appConfig->publicUploadPath);
            // Path to upload file
            $filepath = ROOTPATH . 'public/'. $imagePath . '/notebooks';
            $files = directory_map($filepath);
            // New File name
            $newfile = $img->getName();
            // Check if image already exists in the directory
            $newfile = $img->getName();
            // Move uploaded image to directroy
            $img->move($filepath, $newfile, true);

        }
            
        // Update Notebook Image field
        if($this->notebookImagesModel->saveImage($notebookId, "$imagePath/notebooks/$newfile")){
            return redirect()->back()->with('message', 'Your new notebook images was updated.');
        } else {
            return redirect()->back()->with('error', 'Failed to update notebook image. Please try again.');
        }
    }
}
