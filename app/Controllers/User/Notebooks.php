<?php
/**
 * Notebooks Controller
 * 
 * This controller handles all user notebook management within the application.
 * 
 * @package    App\User\Controllers
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-kumbuka-ci
 */
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
    protected $notebookModel;

    public function __construct()
    {
        $this->notebookImagesModel = model(NotebookImagesModel::class);
        $this->notebookModel = model(NotebookModel::class);
    }

    public function index()
    {

        if (auth()->id() !== $this->userId) {
            return redirect()->to('home')->with('error', 'Wait a minute. Those aren\'t your notes. You can only view your own note collection.');
        }

        $user = model(UserDetailsModel::class)->find($this->userId);

        $notebookModel = model(NotebookModel::class);
        $notebooks = $notebookModel->getNotebooksByUserId($this->userId);

        return $this->renderView('pages/notebooks/index', [
            'appTitle' => setting('App.appName') . ' | Your Notebooks',
            'pageHeader' => "$user->first_name $user->last_name's Notebooks",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => "$user->first_name $user->last_name's Notebooks", 'url' => ''],
            ],
            'userId' => $this->userId,
            'userNotebooks' => $notebooks,
        ]);
    }

    public function new()
    {
        $userId = auth()->id();

        $data['status'] = [
            'public' => '(Public) Everyone',
            'private' => '(Private) Only You',
            'archived' => '(Archive) Stored For later'
        ];


        return $this->renderView('pages/notebooks/new', [
            'appTitle' => setting('App.appName') . ' | Your Notebooks',
            'pageHeader' => 'New Notebooks',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'Notebooks', 'url' => site_url('/notebooks')],
                ['label' => 'New Notebooks', 'url' => ''],
            ],
            'data' => $data,
            'userId' => $userId,
        ]);
    }

    public function create()
    {
        $rules = [
            'name' => [
                'label' => 'Notebook Name',
                'rules' => 'required|max_length[255]|min_length[5]',
                'errors' => [
                    'required' => '{field} is required.',
                    'min_length' => 'can be no less then 5 characters.'
                ]
            ],
            'description' => [
                'label' => 'Notebook Description',
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'min_length' => '{field} can be no less then 10 characters.',
                ]
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[private, public, archived]',
                'errors' => [
                    'required' => 'A {field} must be selected.'
                ]
            ],

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // Inject polymorphic identifiers
        $noteData = [
            'user_id' => $this->userId,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'metadata' => $this->request->getPost('metadata'),
            'status' => $this->request->getPost('status'),
        ];


        // Save via Model
        if (!$this->notebookModel->save($noteData)) {
            return redirect()->to('notebooks')->withInput()->with('message', "Oh no, Something went wrong and the notebook couldn't be save.");
        }


        return redirect()->to('notebooks')->with('message', 'Your new notebook was saved.');

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
            return redirect()->to('notebooks')->with('message', 'Notebook updated successfully');
        }

        // Return validation errors if the model rules fail
        return redirect()->back()->with('errors', $notebookModel->errors());
    }


    public function show($notebookId = null)
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
                ['label' => 'Notebooks', 'url' => site_url('/notebooks')],
                ['label' => 'Edit Notebooks', 'url' => ''],
            ],
            'userId' => $userId,
            'notebook' => $notebook,
        ]);
    }


    public function edit()
    {

    }

    public function uploadImage()
    {

        $validationRule = [
            'notebook-image' => [
                'label' => 'File',
                'rules' => [
                    'uploaded[notebook-image]', // Ensures a file was actually sent
                    'is_image[notebook-image]', // Blocks malicious scripts disguised as images
                    'mime_in[notebook-image,image/jpg,image/jpeg,image/png,image/webp]', // Safe format whitelist
                    'max_size[notebook-image,5120]', // Limit to 5MB (phone photos can be large)
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
            $dirHash = md5($this->username . '|' . $this->userId);
            $imagePath = str_replace('%username%', $dirHash, $appConfig->publicUploadPath);
            // Path to upload file
            $filepath = ROOTPATH . 'public/' . $imagePath . '/notebooks';
            $files = directory_map($filepath);
            // New File name
            $newfile = $img->getName();
            // Move uploaded image to directroy
            $img->move($filepath, $newfile, true);

            // Path to new file
            $newFile = "$filepath/$newfile";

            // Crop the image to a perfect 400x400px centered square automatically
            \Config\Services::image()
                ->withFile($newFile)
                ->fit(400, 400, 'center') // Dimensions: Width, Height, Position Anchor
                ->save($newFile); // Overwrites the original raw file securely

        }

        // Update Notebook Image field
        if ($this->notebookImagesModel->saveImage($notebookId, "$imagePath/notebooks/$newfile")) {
            return redirect()->back()->with('message', 'Your new notebook images was updated.');
        } else {
            return redirect()->back()->with('error', 'Failed to update notebook image. Please try again.');
        }
    }

    public function showPublicNotebooks(int $userId)
    {
        echo "Notebook Collection for User ID: $userId";
    }
}
