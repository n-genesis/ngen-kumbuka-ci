<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class NotificationsSeeder extends Seeder
{
    public function run()
    {
        $noticesData = [
            [
                'id' => 1,
                'recipient_id' => 1, 
                'actor_id'=> 2,
                'source_id'=> 1,
                'source_type' => 'share',
                'message' => 'Wow someone shared your note.',
                'is_read' => 0,
                'created_at' => Time::now(),
            ],
            [
                'id' => 2,
                'recipient_id' => 1, 
                'actor_id'=> 3,
                'source_id'=> 2,
                'source_type' => 'share',
                'message' => 'Way to go, someone shared your note.',
                'is_read' => 0,
                'created_at' => Time::now(),
            ],
            [
                'id' => 3,
                'recipient_id' => 1, 
                'actor_id'=> 4,
                'source_id'=> 1,
                'source_type' => 'comment',
                'message' => 'I guess someone might think....',
                'is_read' => 0,
                'created_at' => Time::now(),
            ],
            [
                'id' => 4,
                'recipient_id' => 2, 
                'actor_id'=> 1,
                'source_id'=> 3,
                'source_type' => 'share',
                'message' => 'Cool, I guess. Ha!',
                'is_read' => 0,
                'created_at' => Time::now(),
            ],
            [
                'id' => 5,
                'recipient_id' => 2, 
                'actor_id'=> 3,
                'source_id'=> 4,
                'source_type' => 'comment',
                'message' => 'Well, I guess someone had something to say.',
                'is_read' => 0,
                'created_at' => Time::now(),
            ],
            [
                'id' => 6,
                'recipient_id' => 2, 
                'actor_id'=> 4,
                'source_id'=> 3,
                'source_type' => 'share',
                'message' => 'Someone shared your note.',
                'is_read' => 0,
                'created_at'=> Time::now(),
            ],
            
        ];

        $this->db->table('notifications')->insertBatch($noticesData);
    }
}
