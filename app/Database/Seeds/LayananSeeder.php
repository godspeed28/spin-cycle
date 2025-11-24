<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'         => 'Cuci Kering',
                'harga_per_kg' => 10000,
            ],
            [
                'nama'         => 'Cuci Setrika',
                'harga_per_kg' => 8000,
            ],
            [
                'nama'         => 'Setrika Saja',
                'harga_per_kg' => 5000,
            ],
            [
                'nama'         => 'Cuci Lipat',
                'harga_per_kg' => 7000,
            ],
        ];

        // Insert batch
        $this->db->table('layanan')->insertBatch($data);
    }
}
