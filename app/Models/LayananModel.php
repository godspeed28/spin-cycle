<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table      = 'layanan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'harga_per_kg'];
    protected $returnType    = 'array';
}
