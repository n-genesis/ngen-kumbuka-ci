<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNoteTypesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('note_types');
    }

    public function down()
    {
        $this->forge->dropTable('note_types');
    }
}
