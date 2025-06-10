<?php

namespace App\Models;

use CodeIgniter\Model;

class PakaianModel extends Model
{
    protected $table      = 'pakaian';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'berat'];

    // Jika ingin hasil dalam array, aktifkan ini:
    protected $returnType     = 'array';
}
