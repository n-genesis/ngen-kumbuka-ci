<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\NoteModel;
use App\Models\NoteTypesModel;
use CodeIgniter\HTTP\ResponseInterface;

class Notes extends UserController
{
    public function index(string $type = '')
    {
        $noteModel = new NoteModel();    

        $noteTypesModel = new NoteTypesModel();
        $noteTypes = $noteTypesModel->getForDropdown();

        return $this->renderView('pages/notes/index',[
            'appTitle' => setting('App.appName').' | Your Notes',
                'pageHeader' => 'Your Notes',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'User Notes', 'url' => ''],
                ],
                'userId' => $this->userId,
                'userNotes' => $noteModel->getNotesByUserId($this->userId, $type),
                'noteTypeDropDown' => $noteTypesModel->getForDropdown(),
            ]);
    }

    public function new(){

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
        if (! $this->validateData($data, $rules)) {
            // If invalid, redirect back user dashboard
            return redirect()->to(uri: 'notes')->with('error', 'Invalid category type selected.');
        }

        return $this->renderView('pages/notes/new',[
            'appTitle' => setting('App.appName').' | New Note',
                'pageHeader' => 'New <span data-note="type">'. ucfirst($noteType) . '</span> Note',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'New Note', 'url' => ''],
                ],
                'selectedType' => $noteType,
                'noteTypeDropDown' => $noteTypesModel->getForDropdown(),
            ]);
    }
}
