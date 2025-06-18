<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\LayananModel;
use App\Models\OrderItemsModel;

class OrderAdminController extends BaseController
{
    protected $orderModel;
    protected $layananModel;
    protected $itemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->layananModel = new LayananModel();
        $this->itemModel = new OrderItemsModel();
    }

    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        helper('my');
        $result = $this->orderModel->findAll();

        $data = [
            'title' => 'Order',
            'orders' => $result,
            'statuses' => getEnumValues('orders', 'status')
        ];
        return view('admin/order', $data);
    }

    public function detail($id)
    {
        helper('my');
        $order = $this->orderModel->find($id);
        $items = $this->itemModel->where('order_id', $id)->findAll();
        $orderJenisLayanan = $order['jenis_layanan'];
        $layanan = $this->layananModel->select('harga_per_kg')->where('nama', $orderJenisLayanan)->get()->getRow();
        if (!$order) {
            return redirect()->to('order')->with('error', 'Pesanan tidak ditemukan');
        }

        return view('admin/order_detail', [
            'title' => 'Detail Pesanan',
            'order' => $order,
            'hargaLayanan' => $layanan,
            'items' => $items
        ]);
    }

    public function update($id)
    {
        $order = $this->orderModel->find($id);

        if (!$order) {
            return redirect()->to('order')->with('error', 'Pesanan tidak ditemukan.');
        }

        $status = $this->request->getPost('status');
        $paid = $this->request->getPost('paid');

        // dd($paid);

        // Optional validation
        if ($status === null || $paid === null) {
            return redirect()->back()->with('error', 'Input tidak valid.');
        }

        if ($status == 'Selesai') {
            $paid = '1';
        }

        $this->orderModel->update($id, [
            'status' => $status,
            'paid' => $paid === '1' ? 1 : 0,
        ]);

        return redirect()->to('order')->with('success', 'Pesanan berhasil diperbarui.');
    }
}
