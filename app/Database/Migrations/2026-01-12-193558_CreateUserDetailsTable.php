<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'first_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'last_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'organization' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'address1' => ['type' => 'TEXT', 'null' => true],
            'address2' => ['type' => 'TEXT', 'null' => true],
            'city' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'state' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'zip' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'avatar' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Link to Shield's users table
        $this->forge->createTable('user_details');
    }

    public function down()
    {
        $this->forge->dropTable('user_details');
    }
}
