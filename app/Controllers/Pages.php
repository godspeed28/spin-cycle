<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LayananModel;
use App\Models\OrderItemsModel;
use App\Models\PakaianModel;
use CodeIgniter\Model;

class Pages extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Home | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()

        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $userId = session()->get('user_id');
        $data = [
            'title' => 'About | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'test' => ['Alfa', 'Emen', 'Abe'],
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];
        return view('pages/about', $data);
    }
    public function services()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Services | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()

        ];
        return view('pages/services', $data);
    }
    public function prices()
    {
        $layananModel = new LayananModel();
        $dataLayananModel = $layananModel->findAll();

        $pakaianModel = new PakaianModel();
        $dataPakaianModel = $pakaianModel->findAll();

        $orderItemModel = new OrderItemsModel();
        $dataItemModel = $orderItemModel
            ->select('nama_pakaian, SUM(jumlah) as total_jumlah')
            ->select('berat_satuan')
            ->groupBy('nama_pakaian')
            ->orderBy('total_jumlah', 'DESC')
            ->limit(6)
            ->findAll();

        $hargaLayanan = [];
        foreach ($dataLayananModel as $row) {
            $hargaLayanan[$row['nama']] = (int)$row['harga_per_kg'];
        }

        if (session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        helper('my');
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Prices | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'hargaLayanan' => $hargaLayanan,
            'items' => $dataItemModel,
            'itemsfull' => $dataPakaianModel,
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()

        ];
        return view('pages/prices', $data);
    }
    public function contact()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Contact | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()

        ];
        return view('pages/contact', $data);
    }
}
