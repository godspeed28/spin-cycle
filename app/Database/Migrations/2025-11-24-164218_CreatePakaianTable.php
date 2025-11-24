<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePakaianTable extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],

            'berat' => [
                'type'       => 'DECIMAL',
                'constraint' => '4,2',
                'null'       => false,
            ],

            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('pakaian');
    }

    public function down()
    {
        $this->forge->dropTable('pakaian');
    }
}
