<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PagesSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $pagesInfo = [
            [
                'id' => 1,
                'user_id' => 1, 
                'title' => 'Privacy Policy', 
                'slug' => 'privacy-policy', 
                'priority' => 'info', 
                'body' => $faker->paragraphs(5),
                'allow_comments' => false,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
            [
                'id' => 2,
                'user_id' => 1, 
                'title' => 'Terms of Use', 
                'slug' => 'terms-of-use', 
                'priority' => 'info', 
                'body' => $faker->paragraphs(5),
                'allow_comments' => false,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
            [
                'id' => 3,
                'user_id' => 2, 
                'slug' => 'the-best-title', 
                'title' => 'Something New Note', 
                'priority' => 'general', 
                'body' => $faker->paragraphs(5),
                'allow_comments' => true,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
            [
                'id' => 4,
                'user_id' => 2, 
                'slug' => 'what-now-im-woundering', 
                'title' => 'What is going on?', 
                'priority' => 'general', 
                'body' => $faker->paragraphs(5),
                'allow_comments' => true,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
        ];

        $this->db->table('pages')->insertBatch($pagesInfo);
    }
}
