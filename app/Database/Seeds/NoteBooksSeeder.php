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
        'name' => 'The First Folder',
        'description' => 'This is a dummy folder for testing purposes.',
        'user_id' => 1,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
      [
        'id' => 2,
        'parent_id' => 1,
        'name' => 'Another Great Folder',
        'description' => 'This is another dummy folder for testing purposes.',
        'user_id' => 1,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
      [
        'id' => 3,
        'parent_id' => null,
        'name' => 'The Second Folder',
        'description' => 'This is a dummy folder for testing purposes.',
        'user_id' => 2,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
      [
        'id' => 4,
        'parent_id' => 3,
        'name' => 'A Great Folder',
        'description' => 'This is a dummy folder for testing purposes.',
        'user_id' => 2,
        'is_folder' => true,
        'metadata' => null,
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
      ],
    ];
    $this->db->table('notebooks')->insertBatch($notebooks);
  }
}
