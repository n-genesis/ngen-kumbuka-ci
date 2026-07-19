<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNoteBooksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'parent_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => null, 'null' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 145, 'null' => false],
            'description' => ['type' => 'TEXT', 'default' => null, 'null' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'is_folder' => ['type' => 'BOOLEAN', 'default' => 1, 'null' => true],
            'metadata' => ['type' => 'TEXT', 'default' => null, 'null' => true],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['private','public','archived'], // Define the ENUM values here
                'default'    => 'private',
                'null'       => false,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Link to Shield's users table
        $this->forge->addForeignKey('parent_id', 'notebooks', 'id', 'NO ACTION', 'CASCADE'); // Link to snippets table
        $this->forge->createTable('notebooks');
    }

    public function down()
    {
        $this->forge->dropTable('notebooks');
    }
}
