<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Checkout extends BaseController
{
    public function proses()
    {
        $session = session();
        $data = [
            'user_id' => $session->get('user_id'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'catatan' => $this->request->getPost('catatan'),
            'jenis_layanan' => $this->request->getPost('jenis_layanan'),
            'jasa_express' => $this->request->getPost('jasa_express'),
            'total_berat' => $this->request->getPost('total_berat'),
            'total_harga' => $this->request->getPost('total_harga'),
            'jenis_pakaian' => $this->request->getPost('jenis_pakaian'), // bisa JSON
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran')
        ];

        // Simpan ke database via model
        $orderModel = new \App\Models\OrderModel();
        $orderItemModel = new \App\Models\OrderItemsModel();
        $orderModel->insert($data);
        $orderId = $orderModel->getInsertID();

        $request = service('request');

        $namaPakaian = $request->getPost('nama_pakaian');
        $jumlah = $request->getPost('jumlah');
        $beratSatuan = $request->getPost('berat_satuan');
        $subtotal = $request->getPost('subtotal');

        $totalBeratSatuan = 0;

        for ($i = 0; $i < count($namaPakaian); $i++) {
            $totalBeratSatuan = $jumlah[$i] * $beratSatuan[$i];
            $orderItemModel->insert([
                'order_id' => $orderId,
                'nama_pakaian' => $namaPakaian[$i],
                'jumlah' => $jumlah[$i],
                'berat_satuan' => $beratSatuan[$i],
                'total_berat' =>  $totalBeratSatuan,
                'subtotal' => $subtotal[$i]
            ]);
        }

        return redirect()->to('/checkout/success')->with('message', 'Pesanan berhasil dibuat!');
    }
    public function success()
    {
        return view('checkout_success');
    }
}
