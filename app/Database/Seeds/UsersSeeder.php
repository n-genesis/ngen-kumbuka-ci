<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        
        $users = [
            [
                'id' => 1,
                'username' => 'andrewnite',
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'active' => true,
            ],
            [
                'id' => 2,
                'username' => 'adriangarber',
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'active' => true,
            ],
        ];

        $this->db->table('users')->insertBatch($users);
    }
}
