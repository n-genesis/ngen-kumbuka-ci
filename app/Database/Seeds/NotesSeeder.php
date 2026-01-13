<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class NotesSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $notesData = [
            [
                'id' => 1,
                'user_id' => 1, 
                'slug' => 'my-first-note', 
                'title' => 'My First Notes', 
                'priority' => 'primary', 
                'body' => $faker->text(125),
                'allow_comments' => false,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'public',
                'type' => 1,
            ],
            [
                'id' => 2,
                'user_id' => 1, 
                'slug' => 'the-second-note', 
                'title' => 'I can Fell It!', 
                'priority' => 'success', 
                'body' => $faker->text(125),
                'allow_comments' => true,
                $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'private',
                'type' => 2,
            ],
            [
                'id' => 3,
                'user_id' => 2, 
                'slug' => 'the-best-title', 
                'title' => 'Something New Note', 
                'priority' => 'success', 
                'body' => $faker->text(125),
                'allow_comments' => true,
                $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'archived',
                'type' => 3,
            ],
            [
                'id' => 4,
                'user_id' => 2, 
                'slug' => 'what-now-im-woundering', 
                'title' => 'What is going on?', 
                'priority' => 'success', 
                'body' => $faker->text(125),
                'allow_comments' => true,
                $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'public',
                'type' => 4
            ],
        ];

        $this->db->table('notes')->insertBatch($notesData);
    }
}
