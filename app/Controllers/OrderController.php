<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\OrderModel;
use App\Models\OrderItemsModel;
use App\Libraries\PdfService;

class OrderController extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $userId = session()->get('user_id');
        $noHp = session()->get('no_telp');

        // if (!$userId) {
        //     return redirect()->to('/Login');
        // }

        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemsModel();

        // Ambil semua pesanan milik user
        $orders = $orderModel->where('user_id', $userId)->findAll();

        // Ambil status untuk semua pesanan user

        $data = [
            'title' => 'Orders | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'noHp' => $noHp,
            'icon' => 'list-alt',
            'orders' => $orders,
            'orderItem' => $orderItemModel->getItemsByUserId($userId),
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];

        return view('order', $data);
    }

    public function generatePdf()
    {

        $pdf = new PdfService();
        $userId = session()->get('user_id');
        $noHp = session()->get('no_telp');

        // if (!$userId) {
        //     return redirect()->to('/Login');
        // }

        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemsModel();

        // Ambil semua pesanan milik user
        $orders = $orderModel->where('user_id', $userId)->findAll();

        // Ambil status untuk semua pesanan user


        $data = [
            'title' => 'Orders | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'noHp' => $noHp,
            'icon' => 'list-alt',
            'orders' => $orders,
            'orderItem' => $orderItemModel->getItemsByUserId($userId),
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];

        $html = view('pdf_template', $data);
        $pdf->generate($html, 'contoh.pdf');
    }

    public function downloadPdf()
    {
        $pdf = new PdfService();

        $data = [
            'title' => 'PDF untuk Download',
            'content' => 'Ini adalah contoh PDF yang akan didownload.'
        ];

        $html = view('order', $data);
        $pdf->generate($html, 'download.pdf', true);
    }

    public function savePdf()
    {
        $pdf = new PdfService();

        $data = [
            'title' => 'PDF Disimpan',
            'content' => 'Ini adalah contoh PDF yang disimpan ke server.'
        ];

        $html = view('pdf_template', $data);
        $output = $pdf->generate($html, 'saved.pdf', false);

        // Simpan ke server
        $path = WRITEPATH . 'uploads/pdf/saved.pdf';
        file_put_contents($path, $output);

        return redirect()->to('/pdf/saved');
    }
}
