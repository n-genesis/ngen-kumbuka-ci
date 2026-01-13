<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CommentsSeeder extends Seeder
{
    public function run()
    {

        $faker = Factory::create();
        $comments = [];

        // Generate 10 fake users
        for ($i = 0; $i < 10; $i++) {
            $rangeIndex = intdiv($i, 2);
            $values = [];
            switch ($rangeIndex) {
                case 0:
                    $values = $this->looper(3,'articles',1,null);
                    break;
                case 1:
                    $values = $this->looper(4,'articles',2,null);
                    break;
                case 2:
                    $values = $this->looper(1,'snippets',1,null);
                    break;
                case 3:
                    $values = $this->looper(1,'snippets',2,5);
                    break;
                case 4:
                    $values = $this->looper(null,null,null,null);
                    break;
            }

            $comments[] = [
                'entity_id' => $values['entity_id'],
                'entity_type' => $values['entity_type'],
                'user_id' => $values['user_id'],
                'parent_comment_id' => $values['parent_comment_id'],
                'body' => $faker->text(125),
                'status' => 'approved',
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            ];
        }

        // Insert data into the 'users' table using Query Builder
        $this->db->table('comments')->insertBatch($comments);
    }

    public function looper($entity_id, $entity_type, $user_id, $parent_comment_id)
    {
        return [
            'entity_id' => $entity_id,
            'entity_type' => $entity_type,
            'user_id' => $user_id,
            'parent_comment_id' => $parent_comment_id,
        ];


    }
}
