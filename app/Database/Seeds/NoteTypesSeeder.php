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
                'name' => $type = strtolower($appConfig->noteTypes[0]),
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', $type),
            ],
            [
                'id' => 1,
                'name' => $type = strtolower($appConfig->noteTypes[1]),
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', $type),
            ],
            [
                'id' => 1,
                'name' => $type = strtolower($appConfig->noteTypes[2]),
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', $type),
            ],
            [
                'id' => 1,
                'name' => $type = strtolower($appConfig->noteTypes[3]),
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', $type),
            ],
            [
                'id' => 1,
                'name' => $type = strtolower($appConfig->noteTypes[2]),
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', $type),
            ],
            [
                'id' => 1,
                'name' => $type = strtolower($appConfig->noteTypes[1]),
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', $type),
            ],
            [
                'id' => 1,
                'name' => $type = strtolower($appConfig->noteTypes[0]),
                'slug' => preg_replace('/[^a-zA-Z0-9]+/', '-', $type),
            ]
        ];

        $this->db->table('note_types')->insertBatch($noteTypes);
    }
}
