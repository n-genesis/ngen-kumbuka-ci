<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\NoteImagesModel;
use App\Models\NoteModel;
use App\Models\NoteTypesModel;
use App\Models\User\UserDetailsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Notes extends UserController
{
    protected $noteModel;
    protected $noteTypesModel;

    protected $rules;

    public function __construct()
    {
        $this->noteModel = model(NoteModel::class);
        $this->noteTypesModel = model(NoteTypesModel::class);

        $this->rules = [
            'title' => [
                'label' => 'Title',
                'rules' => 'required|max_length[255]|min_length[5]',
                'errors' => [
                    'required' => '{field} is required.',
                    'min_length' => 'can be no less then 5 characters.'
                ]
            ],
            'body' => [
                'label' => 'Note Content',
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'min_length' => '{field} can be no less then 10 characters.',
                ]
            ],
            'priority' => [
                'label' => 'Priority',
                'rules' => 'required|regex_match[/^#?([a-fA-F0-9]{3,4}|[a-fA-F0-9]{6}|[a-fA-F0-9]{8})$/]',
                'errors' => [
                    'regex_match' => 'The theme color must be a valid CSS hexadecimal color code (e.g. #FF5733).'
                ]
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[private,public,archived]',
                'errors' => [
                    'required' => 'A {field} must be selected.'
                ]
            ],
            'notebook_id' => [
                'label' => 'Notebook',
                'rules' => 'required|is_not_unique[notebooks.id]',
                'errors' => [
                    'required' => 'Notebook Note Found',
                ]
            ],
            'type_id' => [
                'label' => 'Note Type',
                'rules' => 'required|is_not_unique[note_types.id]',
                'errors' => [
                    'required' => 'Unsupported Note Type',
                ]
            ]

        ];
    }
    /**
     * Show a Users Account Notes Collection
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function index() {

        $userModel = model(UserDetailsModel::class);
        $user = $userModel->getDetailsByUserId($this->userId);
        $username = "$user->first_name $user->last_name";

        // Check if current User is access there own note collection
        if (auth()->id() !== $this->userId) {
            return redirect()->to('home')->with('error', 'Oh no, this is not your notebooks collection. You can only view your own.');
        }

        return $this->renderView('pages/notes/index', [
            'appTitle' => setting('App.appName') . " | $username Note's",
            'pageHeader' => "Your Notes",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => "Your Notes", 'url' => ''],
            ],
            'userId' => $this->userId,
            'userNotes' => $this->noteModel->getNotesByUserId($this->userId),
            'noteTypeDropDown' => $this->noteTypesModel->getForDropdown(),
        ]);
    }

    public function new()
    {

        // Get note type from URL query
        $noteType = $this->request->getGet('type');

        // Get the parameter from the URL query string (?type=...)
        $data = [
            'type' => $noteType,
        ];

        $appConfig = config('App');// Get the array of allow note types from the App config file
        $allowedTypes = strtolower(implode(',', $appConfig->noteTypes));

        // Define rules (Check if the note types are allowed)
        $rules = [
            'type' => "required|in_list[$allowedTypes]",
        ];

        // Run validation
        if (!$this->validateData($data, $rules)) {
            // If invalid, redirect back user dashboard
            return redirect()->to('notes')->with('message', 'To post something new click the "Add New" button in the Navbar and pick the category. Easy like Potatos!');
        }

        return $this->renderView('pages/notes/new', [
            'appTitle' => setting('App.appName') . ' | New Note',
            'pageHeader' => 'New <span data-note="type">' . ucfirst($noteType) . '</span> Note',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'User Notes', 'url' => site_url('notes')],
                ['label' => 'New Note', 'url' => ''],
            ],
            'selectedType' => $noteType,
            'selectTypeId'=> $this->noteTypesModel->getIdByName($noteType)->id,
            'noteTypeDropDown' => $this->noteTypesModel->getForDropdown(),
        ]);
    }

    public function create()
    {

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // Inject polymorphic identifiers
        $noteData = [
            'user_id' => $this->userId,
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'body' => $this->request->getPost('body'),// body input attribute name="content" for clarity
            'sticker' => $this->request->getPost('sticker'),
            'priority' => $this->request->getPost('priority'),
            'allow_comments' => $this->request->getPost('allow_comments'),
            'status' => $this->request->getPost('status'),
            'type_id' => $this->request->getPost('type_id'),
            'notebook_id' => $this->request->getPost('notebook_id'),
        ];

        // Save via Model
        if ($this->noteModel->save($noteData)) {
            return redirect()->to("/notes")->with('message', 'Note created successfully!');
        }

        return redirect()->back()->withInput()->with('message','Failed to save note.');
    }

    /**
     * Show a User Note
     * @param int $id
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function show(int $id) {
        $note = $this->noteModel->getNoteById($id);

        $noteImageModel = model(NoteImagesModel::class);
        // Get Note Images
        $noteImages = $noteImageModel->getImagesByNoteId($this->userId);

        if (!$note || $note->user_id != $this->userId) {
            return redirect()->to('home')->with('error', 'Sorry, I couldn\'t find that Note or maybe it wasn\'t posted by that specific user.');
        }

        echo 'User Show';
        
    }

    public function edit(int $id = null){
        $note = $this->noteModel->getNoteById($id);

        if(!$id && $note->user_id != $this->userId){
            return redirect()->to('notes')->with('error', "I don't think that's your Note =( Please try again. Thanks!");
        }

        $noteType = $this->noteTypesModel->getById($note->type_id);

        return $this->renderView('pages/notes/edit', [
            'appTitle' => setting('App.appName') . ' | New Note',
            'pageHeader' => 'New <span data-note="type">' . ucfirst($note->title) . '</span> Note',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'User Notes', 'url' => site_url('notes')],
                ['label' => 'New Note', 'url' => ''],
            ],
            'selectedType' => $this->noteTypesModel->getById($note->type_id)->name,
            'noteType' => $this->noteTypesModel->getById($note->type_id)->name,
            'noteTypeId'=> $note->type_id,
            'noteTypeDropDown' => $this->noteTypesModel->getForDropdown(),
            'priority' => $this->noteModel->getNotePriority('priority'),
            'note' => $note,
        ]);
    }

    public function update($id = null)
    {
        // Get the current logged-in user's ID via Shield
        $currentUserId = auth()->id();

        // Verify this notebook exists AND belongs to this user
        $note = $this->noteModel->getNoteById($id);

        if (!$note  && $note->user_id != $this->userId) {
            // Return error message if notebook is accessed by unauthorized users
            return redirect()->back()->with('error', 'Doesn\'t look like you\'re unauthorized to open this notebook.');
        }

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Extract the update payload safely (supports PUT/PATCH content types)
        $data = $this->request->getRawInput();

        // Prevent malicious payload injection 
        // Ensure they cannot change the owner or the notebook ID itself
        unset($data['user_id']);
        unset($data['id']);

        // 5. Update the database and respond
        if ($this->noteModel->update($id, $data)) {
            return redirect()->to('notes')->with('message', 'Notebook updated successfully');
        }

        // Return validation errors if the model rules fail
        return redirect()->back()->with('errors', $this->noteModel->errors());
    }

    public function delete(int $id){
        If(($note = $this->noteModel->find($id))){
            if($note->user_id == $this->userId){
               $this->noteModel->delete($id);
                return redirect()->to('notes')->with('message','Your note have been deleted'); 
            } else {
                return redirect()->to('notes')->with('message', "Looks like you don't have permistion to delete this note.");
            }
            
        }else {
            return redirect()->to('notes')->with('error', 'Note Record note found');
        }
    }

    /**
     * Other Users Public Note Collection
     * @param int $userId
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function showPublicNotes(int $userId){
        $userModel = model(UserDetailsModel::class);
        $user = $userModel->getDetailsByUserId($userId);
        $fullname = "$user->first_name $user->last_name";

        // Check if current User is access there own note collection
        if (!$userId) {
            return redirect()->to('home')->with('error', 'Oh no, this is not your notebooks collection. You can only view your own.');
        }

        return $this->renderView('pages/notes/index', [
            'appTitle' => setting('App.appName') . " | $user->username Note's",
            'pageHeader' => "$fullname's Notes",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => "$fullname's Notes", 'url' => ''],
            ],
            'userId' => $userId,
            'userNotes' => $this->noteModel->getNotesByUserId($userId),
            'noteTypeDropDown' => $this->noteTypesModel->getForDropdown(),
        ]);
    }

    /**
     * Public Users Note Post
     * @param int $userId
     * @param string $slug
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function showPublicNote(int $userId, string $slug)
    {
        $noteModel = model(NoteModel::class);
        // Get Note
        $note = $noteModel->getNoteBySlug($userId, $slug);

        $noteImageModel = model(NoteImagesModel::class);
        // Get Note Images
        $noteImages = $noteImageModel->getImagesByNoteId($note->id);

        if (!$note || $note->user_id != $userId) {
            return redirect()->to('home')->with('error', 'Sorry, I couldn\'t find that Note or maybe it wasn\'t posted by that specific user.');
        }

        return $this->renderView('pages/notes/show_public', [
            'appTitle' => setting('App.appName') . ' | View Note',
            'pageHeader' => "$note->author_first_name $note->author_last_name's Notes",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => "$note->author_first_name $note->author_last_name's Notes", 'url' => site_url("users/$note->user_id/notes")],
                ['label' => $note->title, 'url' => ''],
            ],
            'note' => $note,
            'noteImages' => $noteImages,
        ]);
    }
}
