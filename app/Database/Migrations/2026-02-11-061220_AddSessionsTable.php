<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSessionsTable extends Migration
{
    public function up()
    {
        // Define the sessions table schema
        $this->forge->addField([
            'id'         => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => false,
            ],
            'timestamp'  => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'data'       => [
                'type'       => 'BLOB',
                'null'       => false,
            ],
        ]);

        // Add the primary key and an index for efficient lookups
        $this->forge->addKey('id', true); // Primary key 'id'
        $this->forge->addKey('timestamp'); // Index on 'timestamp' for cleanup

        // Create the table named 'sessions'
        $this->forge->createTable('km_sessions', true);
    }

    public function down()
    {
        // Drop the table if the migration is rolled back
        $this->forge->dropTable('km_sessions', true);
    }
}
