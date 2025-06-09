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

    public function getItemsByUserId($userId)
    {
        return $this->db->table('order_items')
            ->select('order_items.*')
            ->join('orders', 'order_items.order_id = orders.id')
            ->where('orders.user_id', $userId)
            ->get()
            ->getResultArray();
    }
}
