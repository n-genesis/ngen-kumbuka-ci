<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SharedNotebooksSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $notebooks = [
            [
                'id' => 1,
                'notebook_id' => 1,
                'owner_id' => 1,
                'shared_user_id' => 2,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'notebook_id' => 2,
                'owner_id' => 1,
                'shared_user_id' => 2,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'notebook_id' => 3,
                'owner_id' => 2,
                'shared_user_id' => 1,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'notebook_id' => 4,
                'owner_id' => 2,
                'shared_user_id' => 1,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('shared_notebooks')->insertBatch($notebooks);
    }
}
