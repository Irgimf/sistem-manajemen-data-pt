<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCompanyIdToSbu extends Migration
{
    public function up()
    {
        $this->forge->addColumn('sbu', [
            'company_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'user_id'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('sbu', 'company_id');
    }
}
