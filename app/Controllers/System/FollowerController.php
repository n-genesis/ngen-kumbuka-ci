<?php

namespace App\Controllers\System;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FollowerController extends BaseController
{
    public function index()
    {
        //
    }

    public function followUser($followerId, $followedId)
    {
        // Implement follow logic here
        return redirect()->back()->with('message', 'User followed successfully!');
    }
}
