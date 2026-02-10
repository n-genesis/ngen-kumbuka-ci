<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSharesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        'note_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        'sharer_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true], // User sharing the note
        'owner_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true], // Original note owner
        'shared_with_user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],// If shared with another user
        'created_at'  => ['type' => 'DATETIME', 'null' => true],
    ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('note_id', 'notes', 'id', 'NO ACTION', 'CASCADE'); // Link notes table
        $this->forge->createTable('shares');
    }

    public function down()
    {
        $this->forge->dropTable('shares');
    }
}
