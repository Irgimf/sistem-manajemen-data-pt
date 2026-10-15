<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Companies extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pt' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_pjbu' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_kta' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_pt' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'kualifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->createTable('companies');
    }

    public function down()
    {
        $this->forge->dropTable('companies');
    }
}
