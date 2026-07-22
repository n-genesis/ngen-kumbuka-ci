<?php
// File: app/Controllers/Auth/RegisterController.php
namespace App\Controllers\Auth;

use CodeIgniter\HTTP\RedirectResponse; 
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;
use App\Models\User\UserDetailsModel;
use Exception;

class RegisterController extends ShieldRegister
{

    public function registerAction(): RedirectResponse
    {
        
        // 1. Let Shield cleanly complete its multi-table insertions first
        $response = parent::registerAction();

        // 2. See if the registration actually completed successfully
        if (session()->has('user_id') || auth()->loggedIn()) {
            
            // Extract the user ID
            $userId = auth()->loggedIn() ? auth()->id() : session('user_id');

            // echo '<pre>';
            // var_dump($userId);
            // echo '</pre>';
            // exit;
            
            try {
                // 3. Save custom data to your separate table safely
                $userDetailsModel = model(UserDetailsModel::class);
                $userDetailsModel->save([
                    'user_id'    => $userId,
                    'first_name' => $this->request->getPost('first_name'),
                    'last_name'  => $this->request->getPost('last_name'),
                ]);
            } catch (Exception $e) {
                // 4. Fallback Safety: If profile creation errors out, clean up the user
                log_message('error', "Profile creation failed for User ID $userId ". $e->getMessage());
                
                $users = auth()->getProvider();
                $users->delete($userId, true); // Purges the user from the database completely

                // Clear any leftover session data
                session()->remove(['user_id', 'logged_in']);
                if (auth()->loggedIn()) {
                    auth()->logout();
                }

                return redirect()->back()->withInput()->with('error', 'Registration system error. Please try again.');
            }
        }

        return $response;
    }
}
