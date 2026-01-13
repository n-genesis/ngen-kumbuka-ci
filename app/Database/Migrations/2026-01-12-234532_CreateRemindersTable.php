<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRemindersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'author_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'note_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'remind_at' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author_id', 'users', 'id', 'NO ACTION', 'CASCADE'); // Link to Shield's users table
        $this->forge->addForeignKey('note_id','notes','id', 'NO ACTION', 'CASCADE'); // Link to note table
        $this->forge->createTable('reminders');
    }

    public function down()
    {
        $this->forge->dropTable('reminders');
    }
}
