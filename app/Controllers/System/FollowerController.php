<?php

namespace App\Controllers\System;

use App\Controllers\UserController;
use App\Models\FollowerModel;
use CodeIgniter\HTTP\ResponseInterface;

class FollowerController extends UserController
{
    protected $followerModel;

    public function __construct()
    {
        // Initialize the model once for use in all methods
        $this->followerModel = model(FollowerModel::class);
    }

    public function index()
    {
        //
    }

    public function followUser($followedId)
    {
        // Prevent users from following themselves
        if ($followedId == auth()->id()) {
            return redirect()->back()->with('error', 'You cannot follow yourself.');
        }

        $result = $this->followerModel->toggleFollow(auth()->id(), $followedId);

        return redirect()->back()->with('message', 'You ' . ($result === 'followed' ? 'are now following' : 'have unfollowed') . ' this user!');
    }
}
