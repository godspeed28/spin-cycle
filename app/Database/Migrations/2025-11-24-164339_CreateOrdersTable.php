<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
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

            'no_resi' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
                'unique'     => true,
            ],

            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],

            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'tanggal' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'waktu' => [
                'type' => 'TIME',
                'null' => true,
            ],

            'jenis_layanan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],

            'jasa_express' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'default'    => 0,
            ],

            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'total_berat' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'null'       => true,
            ],

            'total_harga' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],

            'metode_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],

            'paid' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => false,
                'default'    => 0,
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'Menunggu konfirmasi',
                    'Menunggu penjemputan',
                    'Sedang dicuci',
                    'Siap diantar',
                    'Dalam pengantaran',
                    'Selesai',
                    'Dibatalkan'
                ],
                'default' => 'Menunggu konfirmasi',
                'null'    => true,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('user_id', 'users', 'id', 'SET NULL', 'CASCADE');

        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
