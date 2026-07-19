<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'entity_id' => ['type' => 'INT', 'constraint' => 11, 'default' => null, 'null' => true],
            'entity_type' => ['type' => 'VARCHAR', 'constraint' => 10, 'default' => null, 'null' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'parent_comment_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => null, 'null' => true],
            'body' => ['type' => 'TEXT', 'null' => false],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['approved', 'pending', 'spam'], // Define the ENUM values here
                'default'    => 'pending',
                'null'       => false,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Link to Shield's users table
        $this->forge->addForeignKey('parent_comment_id', 'comments', 'id', 'NO ACTION', 'CASCADE'); // Link to snippets table
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
