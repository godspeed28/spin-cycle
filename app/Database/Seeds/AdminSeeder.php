<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'admin',
            'password'      => password_hash('admin123', PASSWORD_DEFAULT),
            'no_telp'       => '08123456789',
            'email'         => 'admin@example.com',
            'role'          => 'admin',
            'alamat'        => 'Alamat Admin',
            'foto'          => null,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
            'last_activity' => null,
        ];

        $this->db->table('users')->insert($data);
    }
}
