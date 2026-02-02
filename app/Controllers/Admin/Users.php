<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Admin User Managment Controller
 * 
 * This controller handles all user-related operations within the admin panel, 
 * and profile management within the application.
 * 
 * @package    App\Controllers
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-bootsnippets-ci
 */
class Users extends AdminController
{
    public function index()
    {
        // Get all Users w/ User Details information
        $users = $this->userModel->findAllWithDetails();

        // Pagination results
        $users = $this->userModel->paginate();
        $pager = $this->userModel->pager;

        return $this->renderView('pages/admin/users/index',[
            'appTitle' => setting('App.appName').' | User Managment',
            'pageHeader' => 'User Managment',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('admin/dashboard')],
                ['label' => 'User Managment', 'url' => ''],
            ],
            'users' => $users,
            'pager' => $pager,
        ]);
    }
    /**
     * Edit Current User Credecials
     * 
     * @param mixed $id
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function edit($id = null)
    {
        // Get User by ID
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to(site_url('admin/users'))->with('error', 'User not found.');
        }

        // Get unique groups from the auth_groups_users table
        $db = \Config\Database::connect();
        $groups = $db->table('auth_groups_users')
            ->select('`group`')
            ->distinct()
            ->get()
            ->getResultArray();

        // Get user groups
        $userGroups = $user->getGroups();

        return $this->renderView('pages/admin/users/edit',[
            'appTitle' => setting('App.appName').' | Edit User',
            'pageHeader' => 'Edit User: '.esc($user->full_name),
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('admin/dashboard')],
                ['label' => 'User Managment', 'url' => site_url('admin/users')],
                ['label' => 'Edit User', 'url' => ''],
            ],
            'user' => $user,
            'groups' => $groups,
            'userGroups' => $userGroups,
        ]);
    }
    /**
     * Update User Information
     * 
     * @param mixed $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update($id = null)
    {

        // Get user
        $user = $this->userModel->find($id);

        // Check if user exists
        if (!$user) {
            return redirect()->to('admin/users')->with('error', 'User not found.');
        }

        // Validate input
        $rules = [
            'username' => 'required|min_length[3]|max_length[30]|alpha_numeric_space',
            'email' => 'required|valid_email',
            'groups' => 'required',
        ];

        // Add password validation if password is provided
        if ($this->request->getPost('password')) {
            $rules['password'] = 'required|strong_password';
            $rules['password_confirm'] = 'required|matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update user
        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];

        // Add password if provided
        if ($this->request->getPost('password')) {
            $userData['password'] = $this->request->getPost('password');
        }

        $user->fill($userData);

        // Save user
        $this->userModel->save($user);

        // Update user groups
        // First remove all existing groups
        foreach ($user->getGroups() as $group) {
            $user->removeGroup($group);
        }
        
        // Then add the selected groups
        $groups = $this->request->getPost('groups');
        if (is_array($groups)) {
            foreach ($groups as $group) {
                $user->addGroup($group);
            }
        }

        return redirect()->to('admin/users')->with('message', 'User updated successfully.');
    }
}
