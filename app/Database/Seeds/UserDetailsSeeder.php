<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserDetailsSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 4; $i++) {
            $avatar = null;
            if($i === 0) {
                $firstName = 'Andrew';
                $lastName = 'Nite';
                $avatar = 'uploads/default-avatar.jpg';
                
            } elseif ($i === 1) {
                $firstName = 'Adrian';
                $lastName = 'Garber';
                $avatar = 'uploads/user-avatar.png';
            } else {
                $firstName = $faker->firstName;
                $lastName = $faker->lastName;
            }

            $detailData = [
                'user_id' => $i + 1,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'bio'        => $faker->text(200), 
                'phone' => $faker->phoneNumber,
                'organization' => $faker->company,
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'avatar' => $avatar
                // ... other fields from your user_details table
            ];
            // Use Query Builder if no dedicated model exists for user_details
            $this->db->query('SET FOREIGN_KEY_CHECKS=0;');
            // Use Query Builder if no dedicated model exists for user_details
            $this->db->table('user_details')->insertBatch($detailData);
            $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
