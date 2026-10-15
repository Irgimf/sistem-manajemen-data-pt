<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSbuProjectsTable extends Migration
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
            'sbu_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nama_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nilai_proyek' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tahun_proyek' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'lama_proyek' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        // $this->forge->addForeignKey('sbu_id', 'sbu', 'id', 'CASCADE', 'CASCADE'); // Optional for SQLite but good practice if engine supports it. SQLite needs foreign keys enabled.
        $this->forge->createTable('sbu_projects');
    }

    public function down()
    {
        $this->forge->dropTable('sbu_projects');
    }
}
