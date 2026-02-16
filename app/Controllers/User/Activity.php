<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\User\UserActivityModel;

class Activity extends UserController
{
    public function index()
    {
        $model = model(UserActivityModel::class);

        $data = [
            'appTitle' => setting('App.appName').' | Recent Activity',
                'pageHeader' => 'Activity Log',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('dashboard')],
                    ['label'=> 'Edit Profile','url'=> site_url('account')],
                    ['label' => 'Activity Log', 'url' => ''],
            ],
            // Users only see their own logs; Admins see everything
            'activities' => $model->where('user_id', auth()->id())
                ->orderBy('created_at', 'DESC')
                ->paginate(10),
            'pager' => $model->pager,
        ];

        return view('pages/user/activity_log', $data);
    }
}
