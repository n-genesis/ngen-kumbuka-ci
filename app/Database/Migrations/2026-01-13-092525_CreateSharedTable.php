<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSharedTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'notebook_id' => ['type' => 'INT', 'constraint' => 11, 'default' => null, 'null' => true],
            'owner_id' => ['type' => 'INT', 'constraint' => 11, 'default' => null, 'null' => true],
            'shared_user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey(['id', 'notebook_id', 'owner_id', 'shared_user_id']);
        $this->forge->addForeignKey('notebook_id', 'notebook', 'id', 'NO ACTION', 'CASCADE'); // Link to Shield's users table
        $this->forge->addForeignKey('owner_id', 'users', 'id', 'NO ACTION', 'CASCADE'); // Link to Shield's users table
        $this->forge->addForeignKey('shared_user_id', 'users', 'id', 'NO ACTION', 'CASCADE'); // Link to snippets table
        $this->forge->createTable('shared');
    }

    public function down()
    {
        $this->forge->dropTable('shared');
    }
}
