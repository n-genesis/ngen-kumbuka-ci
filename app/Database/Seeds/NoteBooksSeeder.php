<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class NoteBooksSeeder extends Seeder
{
  public function run()
  {
    $faker = Factory::create();
    $notebooks = [
      [
        'id' => 1,
        'parent_id' => null,
        'name' => 'Dummy Folder',
        'user_id' => 1,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
      [
        'id' => 2,
        'parent_id' => 1,
        'name' => 'Dummy Folder',
        'user_id' => 1,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
      [
        'id' => 3,
        'parent_id' => null,
        'name' => 'Dummy Folder',
        'user_id' => 2,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
      [
        'id' => 4,
        'parent_id' => 3,
        'name' => 'Dummy Folder',
        'user_id' => 2,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
    ];
    $this->db->table('notebooks')->insertBatch($notebooks);
  }
}
