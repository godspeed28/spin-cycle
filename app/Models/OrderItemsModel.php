<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemsModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_id',
        'nama_pakaian',
        'jumlah',
        'berat_satuan',
        'total_berat',
        'subtotal',
    ];

    protected $useTimestamps = false;
}
