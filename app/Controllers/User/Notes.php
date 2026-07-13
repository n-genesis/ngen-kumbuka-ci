<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\NoteModel;
use App\Models\NoteTypesModel;
use CodeIgniter\HTTP\ResponseInterface;

class Notes extends UserController
{
    protected $notesModel;
    protected $noteTypesModel;

    protected $rules;

    public function __construct()
    {
        $noteModel = model(NoteModel::class);
        $noteTypesModel = model(NoteTypesModel::class);

        $this->rules = [
            'title' => [
                'label' => 'Title',
                'rules' => 'required|max_length[255]|min_length[5]',
                'errors' => [
                    'required' => '{field} is required.',
                    'min_length' => 'can be no less then 5 characters.'
                ]
            ],
            'slug' => [
                'label' => 'Slug URL',
                'rules' => 'permit_empty|alpha_dash|is_unique[notes.slug,id,{id}]|min_length[3]|max_length[255]',
                'errors' => [
                    'regex_match' => 'The {field} field may only contain alpha-numeric characters and dashes.',
                ],
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
                'rules' => 'required|in_list[primary,secondary,success,danger,warning,info]',
                'errors' => [
                    'required' => 'A {field} must be selected.'
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
    public function index($userId = null)
    {
        if ($userId === null) {
            return redirect()->to('home')->with('error', 'User ID is required.');
        }
        $noteModel = model(NoteModel::class);

        $noteTypesModel = model(NoteTypesModel::class);

        return $this->renderView('pages/notes/index', [
            'appTitle' => setting('App.appName') . ' | Your Notes',
            'pageHeader' => 'Your Notes',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'User Notes', 'url' => ''],
            ],
            'userId' => $userId,
            'userNotes' => $noteModel->getNotesByUserId($userId),
            'noteTypeDropDown' => $noteTypesModel->getForDropdown(),
        ]);
    }

    public function new()
    {
        $noteModel = model(NoteModel::class);

        // echo '<pre>';
        // print_r($noteModel->getNotePriority('priority'));
        // echo '</pre>';
        // exit;

        // 1. Get note type from URL query
        $noteType = $this->request->getGet('type');

        // 2. Get the parameter from the URL query string (?type=...)
        $data = [
            'type' => $noteType,
        ];

        $appConfig = config('App');// Get the array of allow note types from the App config file
        $allowedTypes = strtolower(implode(',', $appConfig->noteTypes));

        // 3. Define rules (Check if the note types are allowed)
        $rules = [
            'type' => "required|in_list[$allowedTypes]",
        ];

        $noteTypesModel = model(NoteTypesModel::class);

        // 4. Run validation
        if (!$this->validateData($data, $rules)) {
            // If invalid, redirect back user dashboard
            return redirect()->to(uri: 'note')->with('error', 'Invalid category type selected.');
        }

        return $this->renderView('pages/notes/new', [
            'appTitle' => setting('App.appName') . ' | New Note',
            'pageHeader' => 'New <span data-note="type">' . ucfirst($noteType) . '</span> Note',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'User Notes', 'url' => site_url('note')],
                ['label' => 'New Note', 'url' => ''],
            ],
            'selectedType' => $noteType,
            'selectTypeId'=> $noteTypesModel->getIdByName($noteType)->id,
            'noteTypeDropDown' => $noteTypesModel->getForDropdown(),
            'priority' => $noteModel->getNotePriority('priority'),
        ]);
    }

    public function create()
    {
        $noteModel = model(NoteModel::class);

        // 1. Validate the 'type' is allowed (e.g., 'user', 'product')
        // $allowedTypes = ['user', 'product', 'order'];
        // if (!in_array($type, $allowedTypes)) {
        //     return $this->fail('Invalid note target type.');
        // }

        // 2. Validate incoming data
        $formData = $this->request->getPost();

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // 3. Inject polymorphic identifiers
        $noteData = [
            'user_id' => $this->userId,
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'body' => $this->request->getPost('body'),// body input attribute name="content" for clarity
            'priority' => $this->request->getPost('priority'),
            'allow_comments' => $this->request->getPost('allow_comments'),
            'status' => $this->request->getPost('status'),
            'type_id' => $this->request->getPost('type_id'),
            'notebook_id' => $this->request->getPost('notebook_id'),
        ];

        // 4. Save via Model
        if ($noteModel->save($noteData)) {
            return redirect()->to("users/" . $this->userId . "/notes")->with('message', 'Note created successfully!');
        }

        return redirect()->back()->withInput()->with('message','Failed to save note.');
    }
    /**
     * Show User Note Post
     * @param int $id
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function show(int $id)
    {
        $noteModel = model(NoteModel::class);
        $note = $noteModel->getNoteById($id);

        if (!$note) {
            return redirect()->to('note')->with('error', 'Note not found.');
        }

        return $this->renderView('pages/notes/show', [
            'appTitle' => setting('App.appName') . ' | View Note',
            'pageHeader' => 'View Note',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'User Notes', 'url' => site_url('note')],
                ['label' => 'View Note', 'url' => ''],
            ],
            'note' => $note,
        ]);
    }
    /**
     * Show a Users Public Note Post
     * @param int $userId
     * @param string $slug
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function showPublicNote(int $userId, string $slug)
    {
        $noteModel = model(NoteModel::class);
        $note = $noteModel->getNoteBySlug($userId, $slug);

        // echo '<pre>';
        // print_r($noteId);
        // echo '</pre>';
        // exit;

        if (!$note || $note->user_id != $userId) {
            return redirect()->to('home')->with('error', 'Sorry, I couldn\'t find that Note or maybe it wasn\'t posted by that specific user.');
        }

        return $this->renderView('pages/notes/show', [
            'appTitle' => setting('App.appName') . ' | View Note',
            'pageHeader' => 'View Note',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label' => 'User Notes', 'url' => site_url('note')],
                ['label' => 'View Note', 'url' => ''],
            ],
            'note' => $note,
        ]);
    }
}
