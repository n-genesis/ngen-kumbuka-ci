<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class Notes extends UserController
{
    public function index(string $type = 'blank')
    {
        // echo
        echo "Note Type: $type";
    }

    public function new(){

        // 1. Get note type from URL query
        $noteType = $this->request->getGet('type');

        // 2. Get the parameter from the URL query string (?type=...)
        $data = [
            'type' => $noteType,
        ];

        $appConfig = config('App');
        $allowedTypes = strtolower(implode(',', $appConfig->noteTypes));

        // 3. Define rules
        $rules = [
            'type' => "required|in_list[$allowedTypes]",
        ];

        // echo '<pre>';
        // print_r($rules['type']);
        // echo'</pre>';
        // exit;

        // 4. Run validation
        if (! $this->validateData($data, $rules)) {
            // If invalid, redirect back user dashboard
            return redirect()->to(uri: 'notes')->with('error', 'Invalid category type selected.');
        }

        return $this->renderView('pages/notes/new',[
            'appTitle' => setting('App.appName').' | New Note',
                'pageHeader' => 'New '. ucfirst($noteType) . ' Note',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label' => 'New Note', 'url' => ''],
                ],
                'selectedType' => $noteType,
            ]);
    }
}
