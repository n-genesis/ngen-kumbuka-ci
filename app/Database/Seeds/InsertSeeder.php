<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertSeeder extends Seeder
{
    public function run()
    {
        // User Details Inserts
        $this->call('UserDetailsSeeder');
        // User Likes Inserts
        $this->call('LikesSeeder');
        // Followers Inserts
        $this->call('FollowersSeeder');
        // User share Inserts
        $this->call('SharedSeeder');
        // Note Comments Inserts
        $this->call('CommentsSeeder');
        // Notes Inserts
        $this->call('NotesSeeder');
        // Notebooks Inserts
        $this->call('NotebooksSeeder');
        // Notebook Types Inserts
        $this->call('NoteBookTypesSeeder');
        // Pages Inserts
        $this->call('PagesSeeder');
    }
}
