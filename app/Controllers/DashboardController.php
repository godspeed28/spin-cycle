<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        helper('my');
        $userModel = new \App\Models\UserModel();
        $orderModel = new \App\Models\OrderModel();
        $today = date('Y-m-d');

        $tanggalMulai = date('Y-m-d', strtotime('-6 days'));
        $tanggalAkhir = date('Y-m-d');

        // data pendapatan 7 hari dari db
        $dataPendapatan = $orderModel->getPendapatanPerHari7HariTerakhir();

        /*raw data pendapatan
        $dataPendapatan = [
            '2025-06-10' => 150000,
            '2025-06-11' => 200000,
            '2025-06-12' => 175000,
            '2025-06-13' => 0,
            '2025-06-14' => 225000,
            '2025-06-15' => 300000,
            '2025-06-16' => 190000,
        ];*/

        $totalPendapatan = array_sum($dataPendapatan);

        // ambil tanggal & bulan 7 hari terakhir
        $range_tanggal = [
            'start' => $tanggalMulai,
            'end' => $tanggalAkhir
        ];

        $tglStart = strtotime($range_tanggal['start']);
        $tglEnd = strtotime($range_tanggal['end']);

        $tglStartFormatted = date('j F', $tglStart);
        $tglEndFormatted = date('j F', $tglEnd);

        $data = [
            'title' => 'Dashboard',
            'users' => $userModel
                ->where('created_at >=', $today . ' 00:00:00')
                ->where('created_at <=', $today . ' 23:59:59')
                ->orderBy('created_at', 'DESC') // <-- Ini penting untuk paling baru
                ->findAll(),
            'orders' => $orderModel
                ->where('paid', 1)
                ->where('created_at >=', $today . ' 00:00:00')
                ->where('created_at <=', $today . ' 23:59:59')
                ->orderBy('created_at', 'DESC') // opsional
                ->findAll(),
            'pendapatanPerMinggu' => $totalPendapatan,
            'tglStartFormatted' => $tglStartFormatted,
            'tglEndFormatted' => $tglEndFormatted
        ];
        return view('admin/dashboard', $data);
    }
}
