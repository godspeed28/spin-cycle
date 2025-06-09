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
        'metode_pembayaran'
    ];
}
