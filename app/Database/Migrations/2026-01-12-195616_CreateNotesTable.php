<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 128],
            'title' => ['type' => 'VARCHAR', 'constraint' => 128],
            'priority' => [
                'type'       => 'ENUM',
                'constraint' => ['primary','secondary','success','danger','warning','info'], // Define the ENUM values here
                'default'    => 'primary',
                'null'       => false,
            ],
            'body' => ['type' => 'TEXT', null => false],
            'allow_comments' => ['type' => 'BOOLEAN', 'null' => true, 'default' => 0],
            'pinned' => ['type' => 'BOOLEAN', 'null' => true, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['private','public','archived'], // Define the ENUM values here
                'default'    => 'private',
                'null'       => false,
            ],
            'type_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Link to Shield's users table
        $this->forge->addForeignKey('type_id', 'note_types', 'id', 'CASCADE', 'CASCADE'); // Link to to Note Type table
        $this->forge->createTable('notes');
    }

    public function down()
    {
        $this->forge->dropTable('notes');
    }
}
