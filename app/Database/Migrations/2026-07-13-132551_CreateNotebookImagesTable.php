<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotebookImagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'notebook_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
            'image_path' => ['type' => 'VARCHAR', 'constraint' => 255],
            'image_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('notebook_id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('notebook_id', 'notebooks', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('notebook_images');
    }

    public function down()
    {
        $this->forge->dropTable('notebook_images');
    }
}
