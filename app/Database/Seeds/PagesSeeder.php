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
                'author_id' => 1, 
                'title' => 'Privacy Policy', 
                'slug' => 'privacy-policy', 
                'type' => 'info', 
                'content' => $faker->paragraphs(5, true),
                'allow_comments' => false,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
            [
                'id' => 2,
                'author_id' => 1, 
                'title' => 'Terms of Use', 
                'slug' => 'terms-of-use', 
                'type' => 'info', 
                'content' => $faker->paragraphs(5, true),
                'allow_comments' => false,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
            [
                'id' => 3,
                'author_id' => 2, 
                'slug' => 'the-best-title', 
                'title' => 'Something New Note', 
                'type' => 'general', 
                'content' => $faker->paragraphs(5, true),
                'allow_comments' => true,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
            [
                'id' => 4,
                'author_id' => 2, 
                'slug' => 'what-now-im-woundering', 
                'title' => 'What is going on?', 
                'type' => 'general', 
                'content' => $faker->paragraphs(5, true),
                'allow_comments' => true,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'published',
            ],
        ];

        $this->db->table('pages')->insertBatch($pagesInfo);
    }
}
