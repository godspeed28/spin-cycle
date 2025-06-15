<?php

namespace App\Controllers;

class OrderAdminController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Order',
        ];
        return view('admin/order', $data);
    }
}
