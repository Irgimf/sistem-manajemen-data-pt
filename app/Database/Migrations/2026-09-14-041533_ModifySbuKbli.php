<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifySbuKbli extends Migration
{
    public function up()
    {
        $fields = [
            'no_sbu' => [
                'name' => 'kode_kbli',
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'sub_bidang' => [
                'name' => 'judul_kbli',
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ];
        $this->forge->modifyColumn('sbu', $fields);
    }

    public function down()
    {
        $fields = [
            'kode_kbli' => [
                'name' => 'no_sbu',
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'judul_kbli' => [
                'name' => 'sub_bidang',
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ];
        $this->forge->modifyColumn('sbu', $fields);
    }
}
