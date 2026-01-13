<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLikesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'entity_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'entity_type' => ['type' => 'VARCHAR', 'constraint' => 128],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey(['user_id', 'entity_id']);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Link to Shield's users table
        $this->forge->createTable('likes');
    }

    public function down()
    {
        $this->forge->dropTable('likes');
    }
}
