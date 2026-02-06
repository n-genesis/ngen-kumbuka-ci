<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;
use Faker\Factory;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        // Get admin details from .env or fallback values
        $email    = getenv('app.adminEmail') ?: 'andrewnite@localhost.com';
        $username = getenv('app.adminUsername') ?: 'admin';
        $password = getenv('app.adminPassword') ?: '5832552911';

        // Check if admin user already exists
        // $existingUser = $users->where('username', $username)->first();

        // if ($existingUser) {
        //     echo "Admin user already exists. Skipping creation.\n";
        //     return;
        // }

        for ($i = 0; $i < 35; $i++) {
            if($i === 0){
                // Create the specified admin user
                $userData = [
                    'username' => $username,
                    'email'    => $email,
                    'password' => $password,
                    'active'   => true,
                ];
            } else {
                // Create additional admin users with fake data
                $userData = [
                    'username' => $faker->userName . $faker->randomNumber(3, true),
                    'email'    => $faker->unique()->safeEmail,
                    'password' => 'Password123!', // Default password for fake admins
                    'active'   => $faker->boolean(),
                ];
            }

            // Retrieve the user back from DB to ensure ID is set
            $savedUser = $this->createUser($userData);

            if (!$savedUser) {
                echo "Failed to retrieve newly created user.\n";
                return;
            }

            // Assign groups
            if($i === 0){
                $savedUser->addGroup('admin');
            }

            $savedUser->addGroup('user');

            // (Optional) Activate the user (usually redundant if 'active' is set)
            //$savedUser->activate();

            echo "User created successfully.\n";

        }
    }

    protected function createUser(array $data)
    {
        $users = new UserModel();

        $user = new User($data);

        if (!$users->save($user)) {
            echo "Failed to create user: " . $data['username'] . "\n";
            print_r($users->errors());
            return null;
        }

        return $users->find($users->getInsertID());
    }
}
