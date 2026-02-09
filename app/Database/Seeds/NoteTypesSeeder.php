<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoteTypesSeeder extends Seeder
{
    public function run()
    {
        $appConfig = config('App');// Get App config file values

        $noteTypes = [
            [
                'id' => 1,
                'name' => $type = $appConfig->noteTypes[0],
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($type)),
                'btn_icon' => 'bi bi-journal-plus',
            ],
            [
                'id' => 2,
                'name' => $type = $appConfig->noteTypes[1],
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($type)),
                'btn_icon' => 'bi bi-check2-square',
            ],
            [
                'id' => 3,
                'name' => $type = $appConfig->noteTypes[2],
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($type)),
                'btn_icon' => 'bi bi-journal-bookmark',
            ],
            [
                'id' => 4,
                'name' => $type = $appConfig->noteTypes[3],
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($type)),
                'btn_icon' => 'bi bi-calendar2-heart',
            ],
        ];

        $this->db->table('note_types')->insertBatch($noteTypes);
    }
}
