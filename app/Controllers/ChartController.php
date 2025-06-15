<?php

namespace App\Controllers;

use App\Models\OrderModel;

class ChartController extends BaseController
{
    public function salesData()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $orderModel = new OrderModel();

        // Ambil data penjualan per bulan (contoh)
        $data = $orderModel->select("MONTH(created_at) as bulan, SUM(total_harga) as total")
            ->groupBy("MONTH(created_at)")
            ->orderBy("bulan")
            ->findAll();

        // Siapkan array data numerik
        $labels = [];
        $values = [];

        $bulanMap = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        foreach ($data as $row) {
            $labels[] = $bulanMap[$row['bulan']];
            $values[] = (int)$row['total'];
        }

        return $this->response->setJSON([
            'labels' => $labels,
            'data' => $values
        ]);
    }
}
