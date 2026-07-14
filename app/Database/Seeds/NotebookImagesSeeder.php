<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class NotebookImagesSeeder extends Seeder
{
    public function run()
    {
        $currentTime = Time::now()->toDateTimeString();

        $noteImagesData = [
            // Note 1 User 1
            [
                'id' => 1,
                'user_id' => 1, 
                'notebook_id' => 1, 
                'image_path' => 'uploads/gallery/blog-post-square-1.webp', 
                'image_name' => 'Notebook Image 1',
                'created_at' => $currentTime,
            ],
            [
                'id' => 2,
                'user_id' => 1, 
                'notebook_id' => 2, 
                'image_path' => 'uploads/gallery/blog-post-square-2.webp', 
                'image_name' => 'Notebook Image 2',
                'created_at' => $currentTime,
            ],
            [
                'id' => 3,
                'user_id' => 1, 
                'notebook_id' => 3, 
                'image_path' => 'uploads/gallery/blog-post-square-3.webp', 
                'image_name' => 'Notebook Image 3',
                'created_at' => $currentTime,
            ],
            [
                'id' => 4,
                'user_id' => 3, 
                'notebook_id' => 4, 
                'image_path' => 'uploads/gallery/blog-post-square-4.webp', 
                'image_name' => 'Notebook Image 4',
                'created_at' => $currentTime,
            ],

        ];

        $this->db->table('notebook_images')->insertBatch($noteImagesData);
    }
}
