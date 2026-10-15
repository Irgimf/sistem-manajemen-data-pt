<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleAndSbu extends Migration
{
    public function up()
    {
        // Add role to users
        $this->forge->addColumn('users', [
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'user',
            ]
        ]);

        // Add user_id to companies
        $this->forge->addColumn('companies', [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ]
        ]);

        // Create SBU table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'no_sbu' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sub_bidang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kualifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'masa_berlaku' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        // SQLite in CI4 might not perfectly handle foreign keys in forge unless configured, but we define it.
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sbu');
    }

    public function down()
    {
        $this->forge->dropTable('sbu');
        $this->forge->dropColumn('companies', 'user_id');
        $this->forge->dropColumn('users', 'role');
    }
}
