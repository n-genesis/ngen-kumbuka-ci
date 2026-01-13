<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LikesSeeder extends Seeder
{
    public function run()
    {
        $likes = [
            [
              'user_id' => 1,
               'entity_id' => 1,
               'entity_type'=> 'note',
            ],
            [
              'user_id' => 1,
               'entity_id' => 2,
               'entity_type'=> 'note',
            ],
            [
              'user_id' => 2,
               'entity_id' => 1,
               'entity_type'=> 'note',
            ],
            [
              'user_id' => 2,
               'entity_id' => 2,
               'entity_type'=> 'note',
            ],
        ];
        $this->db->table('likes')->insertBatch($likes);
    }
}
