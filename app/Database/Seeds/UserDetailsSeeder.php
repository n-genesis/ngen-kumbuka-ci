<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserDetailsSeeder extends Seeder
{
    public function run()
    {
        // 2. Insert the additional details into the 'user_details' table
        $detailData = [
            [
                'user_id' => 1,
                'first_name' => 'Andrew',
                'last_name' => 'Nite',
                'phone' => '(904) 479-5460',
                'organization' => 'N-Gen Design',
                'address1' => '1456 Chestnut Dr',
                'address2' => null,
                'city' => 'Centralia',
                'state' => 'Pennsylvania',
                'zip' => 17920,
                'avatar' => '1759452960_4089d9940012885b223c.jpg'
                // ... other fields from your user_details table
            ],
            [
                'user_id' => 2,
                'first_name' => 'Adrian',
                'last_name' => 'Garber',
                'phone' => '(717) 367-2573',
                'organization' => 'Silver Cafe',
                'address1' => '505 East Park Street',
                'address2' => null,
                'city' => 'Elizabethtown',
                'state' => 'Pennsylvania',
                'zip' => 17022,
                'avatar' => null
                // ... other fields from your user_details table
            ],
        ];

        // Use Query Builder if no dedicated model exists for user_details
        $this->db->table('user_details')->insertBatch($detailData);
    }
}
