<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class NoteImagesSeeder extends Seeder {
    public function run() {
        $currentTime = Time::now()->toDateTimeString();

        $noteImagesData = [
            // Note 1 User 1
            [
                'id' => 1,
                'user_id' => 1, 
                'note_id' => 1, 
                'file_path' => 'uploads/gallery/blog-post-1.webp', 
                'file_name' => 'Bolg Post 1', 
                'file_size' => 0,
                'sort_order' => 1,
                'created_at' => $currentTime,
            ],
            [
                'id' => 2,
                'user_id' => 1, 
                'note_id' => 1, 
                'file_path' => 'uploads/gallery/blog-post-2.webp', 
                'file_name' => 'Bolg Post 2', 
                'file_size' => 0,
                'sort_order' => 2,
                'created_at' => $currentTime,
            ],
            [
                'id' => 3,
                'user_id' => 1, 
                'note_id' => 1, 
                'file_path' => 'uploads/gallery/blog-post-3.webp', 
                'file_name' => 'Bolg Post 3', 
                'file_size' => 0,
                'sort_order' => 3,
                'created_at' => $currentTime,
            ],
            [
                'id' => 4,
                'user_id' => 1, 
                'note_id' => 1, 
                'file_path' => 'uploads/gallery/blog-post-4.webp', 
                'file_name' => 'Bolg Post 4', 
                'file_size' => 0,
                'sort_order' => 4,
                'created_at' => $currentTime,
            ],
            [
                'id' => 5,
                'user_id' => 1, 
                'note_id' => 1, 
                'file_path' => 'uploads/gallery/blog-post-5.webp', 
                'file_name' => 'Bolg Post 5', 
                'file_size' => 0,
                'sort_order' => 5,
                'created_at' => $currentTime,
            ],
            [
                'id' => 6,
                'user_id' => 2, 
                'note_id' => 3, 
                'file_path' => 'uploads/gallery/blog-post-1.webp', 
                'file_name' => 'Bolg Post 1', 
                'file_size' => 0,
                'sort_order' => 1,
                'created_at' => $currentTime,
            ],
            [
                'id' => 7,
                'user_id' => 2, 
                'note_id' => 3, 
                'file_path' => 'uploads/gallery/blog-post-2.webp', 
                'file_name' => 'Bolg Post 2', 
                'file_size' => 0,
                'sort_order' => 2,
                'created_at' => $currentTime,
            ],

        ];

        $this->db->table('note_images')->insertBatch($noteImagesData);
    }
}
