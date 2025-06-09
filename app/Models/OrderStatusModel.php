<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderStatusModel extends Model
{
    protected $table      = 'order_statuses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'status', 'updated_at'];
    protected $useTimestamps = false; // karena kita pakai CURRENT_TIMESTAMP langsung
}
