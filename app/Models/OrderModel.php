<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = [
        'no_resi',
        'user_id',
        'nama',
        'alamat',
        'tanggal',
        'waktu',
        'catatan',
        'jenis_layanan',
        'jasa_express',
        'total_berat',
        'total_harga',
        'metode_pembayaran',
        'paid',
        'status'
    ];

    public function getPendapatanPerHari7HariTerakhir()
    {
        $builder = $this->db->table('orders');
        $builder->select("DATE(created_at) as tanggal, SUM(total_harga) as total");
        $builder->where('created_at >=', date('Y-m-d', strtotime('-6 days')));
        $builder->where('paid', 1);
        $builder->groupBy('DATE(created_at)');
        $query = $builder->get();
        $result = $query->getResultArray();

        // Siapkan array default dengan 0
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = date('Y-m-d', strtotime("-$i days"));
            $data[$tanggal] = 0;
        }

        // Masukkan data dari hasil query
        foreach ($result as $row) {
            $data[$row['tanggal']] = (int) $row['total'];
        }

        return $data;
    }
}
