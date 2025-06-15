<?php

namespace App\Controllers;

use App\Models\OrderModel;

class OrderAdminController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
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
        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->to('order')->with('error', 'Pesanan tidak ditemukan');
        }

        return view('admin/order_detail', [
            'title' => 'Detail Pesanan',
            'order' => $order
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

        // Optional validation
        if ($status === null || $paid === null) {
            return redirect()->back()->with('error', 'Input tidak valid.');
        }

        $this->orderModel->update($id, [
            'status' => $status,
            'paid' => $paid === '1' ? 1 : 0,
        ]);

        return redirect()->to('order')->with('success', 'Pesanan berhasil diperbarui.');
    }
}
