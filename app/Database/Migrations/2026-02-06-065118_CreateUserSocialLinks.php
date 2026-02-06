<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserSocialLinks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => false],
            'link'=> ['type'=> 'VARCHAR', 'constraint' => 255, 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE'); // Link to Shield's users table
        $this->forge->createTable('user_social_links');
    }

    public function down()
    {
        $this->forge->dropTable('user_social_links');
    }
}
