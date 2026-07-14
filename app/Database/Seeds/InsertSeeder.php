<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertSeeder extends Seeder
{
    public function run()
    {
        // Users Inserts
        $this->call('AdminSeeder');
        // Auth Identities Inserts
        //$this->call('AuthIdentitiesSeeder');
        // User Details Inserts
        $this->call('UserDetailsSeeder');
        // User Social Links Inserts
        $this->call('UserSocialLinksSeeder');
        // Notebook Types Inserts
        $this->call('NoteTypesSeeder');
        // Notebooks Inserts
        $this->call('NotebooksSeeder');
        // Nootbook Images
        $this->call('NotebookImagesSeeder');
        // Notes Inserts
        $this->call('NotesSeeder');
        // Note Images
        $this->call('NoteImagesSeeder');
        // User Likes Inserts
        $this->call('LikesSeeder');
        // Followers Inserts
        $this->call('FollowersSeeder');
        // User share Inserts
        $this->call('SharedNotebooksSeeder');
        // Note Comments Inserts
        $this->call('CommentsSeeder');
        // Note Comments Inserts
        $this->call('NotificationsSeeder');
        // Pages Inserts
        $this->call('PagesSeeder');
    }
}
