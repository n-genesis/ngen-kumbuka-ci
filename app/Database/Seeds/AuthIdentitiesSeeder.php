<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AuthIdentitiesSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        
        $authDetails = [
            [
                'user_id' => 1,
                'type' => 'email_password',
                'secret' => 'andrewnite@localhost.com',
                'secret2' => '$2y$12$MECo0gM14FBTpmtLSPx7teukjl/o03X/3ko9yYQ5Mz8/8xNVE81yi',
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'force_reset' => false,
            ],
            [
                'user_id' => 2,
                'type' => 'email_password',
                'secret' => 'adriangarber@localhost.com',
                'secret2' => '$2y$12$HqHFBIqAZU31KcJxoVwkFe5K0s1kYuUPWCo8prkNpINXeSP3NlEJq',
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'force_reset' => false,
            ],
        ];

        $this->db->table('auth_identities')->insertBatch($authDetails);
    }
}
