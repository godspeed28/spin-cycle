<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class OrderController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Orders | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924'
        ];

        return view('order', $data);
    }
}
