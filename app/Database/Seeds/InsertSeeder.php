<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertSeeder extends Seeder
{
    public function run()
    {
        // Users Inserts
        //$this->call('UsersSeeder');
        // Auth Identities Inserts
        //$this->call('AuthIdentitiesSeeder');
        // User Details Inserts
        $this->call('UserDetailsSeeder');
        // Notebook Types Inserts
        $this->call('NoteTypesSeeder');
        // Notes Inserts
        $this->call('NotesSeeder');
        // Notebooks Inserts
        $this->call('NotebooksSeeder');
        // User Likes Inserts
        $this->call('LikesSeeder');
        // Followers Inserts
        $this->call('FollowersSeeder');
        // User share Inserts
        $this->call('SharedSeeder');
        // Note Comments Inserts
        $this->call('CommentsSeeder');
        
        // Pages Inserts
        $this->call('PagesSeeder');
    }
}
