<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSocialLinksSeeder extends Seeder
{
    public function run()
    {

        $socialLinks = [
            [
                'id' => 1,
                'user_id' => 1, 
                'title' => 'facebook',
                'link' => 'https://facebook.com/ngendesign',
            ],
            [
                'id' => 2,
                'user_id' => 1, 
                'title' => 'twitter',
                'link' => 'https://twitter.com/ngendesign',
            ],
            [
                'id' => 3,
                'user_id' => 1, 
                'title'=> 'snapchat',
                'link'=> 'https://snapchat.address.com/ngendesign',
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'title'=> 'Instagram',
                'link'=> 'https://instagram.com/ngendesign',
                
            ],
        ];

        $this->db->table('user_social_links')->insertBatch($socialLinks);
    }
}
