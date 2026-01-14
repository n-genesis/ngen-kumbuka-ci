<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => false],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 128],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['draft','info','general','archived'], // Define the ENUM values here
                'default'    => 'draft',
                'null'       => false,
            ],
            'author_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'content' => ['type' => 'TEXT', 'null' => false],
            'allow_comments' => ['type' => 'BOOLEAN', 'null' => true, 'default' => 0],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['draft','published','archived'], // Define the ENUM values here
                'default'    => 'draft',
                'null'       => false,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author_id', 'users', 'id', 'NO ACTION', 'NO ACTION'); // Link to Shield's users table
        $this->forge->createTable('pages');
    }

    public function down()
    {
        $this->forge->dropTable('pages');
    }
}
