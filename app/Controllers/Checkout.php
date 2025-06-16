<?php

namespace App\Controllers;

use App\Libraries\MidtransConfig;
use Midtrans\Snap;

class Checkout extends BaseController
{
    // ⬇️ Pindahkan generateResi() ke method private
    private function generateResi()
    {
        $timestamp = date('YmdHis');
        $random = strtoupper(substr(md5(uniqid()), 0, 3));
        return 'SC' . $timestamp . $random;
    }

    public function proses()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        helper('text');

        $session = session();
        $userId = $session->get('user_id');
        $metode = $this->request->getPost('metode_pembayaran');
        $noResi = $this->generateResi();

        $data = [
            'no_resi' => $noResi,
            'user_id' => $userId,
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'catatan' => $this->request->getPost('catatan'),
            'jenis_layanan' => $this->request->getPost('jenis_layanan'),
            'jasa_express' => $this->request->getPost('jasa_express'),
            'total_berat' => $this->request->getPost('total_berat'),
            'total_harga' => $this->request->getPost('total_harga'),
            'jenis_pakaian' => json_encode($this->request->getPost('jenis_pakaian')),
            'metode_pembayaran' => $metode,
            'paid' => ($metode != 'COD') ? 1 : 0,
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];

        $namaPakaian = $this->request->getPost('nama_pakaian');
        $jumlah = $this->request->getPost('jumlah');
        $beratSatuan = $this->request->getPost('berat_satuan');
        $subtotal = $this->request->getPost('subtotal');

        $orderModel = new \App\Models\OrderModel();
        $orderItemModel = new \App\Models\OrderItemsModel();

        $orderModel->insert($data);
        $orderId = $orderModel->getInsertID();

        for ($i = 0; $i < count($namaPakaian); $i++) {
            $orderItemModel->insert([
                'order_id' => $orderId,
                'nama_pakaian' => $namaPakaian[$i],
                'jumlah' => $jumlah[$i],
                'berat_satuan' => $beratSatuan[$i],
                'total_berat' => $jumlah[$i] * $beratSatuan[$i],
                'subtotal' => $subtotal[$i]
            ]);
        }

        if ($metode == 'COD') {
            return redirect()->to('/checkout/success')->with('message', 'Pesanan COD berhasil dibuat!');
        }

        // Midtrans Payment
        MidtransConfig::config();

        $params = [
            'transaction_details' => [
                'order_id' => $noResi,
                'gross_amount' => $data['total_harga']
            ],
            'customer_details' => [
                'first_name' => $data['nama'],
                'email' => 'email@example.com', // Ganti dengan data dari database jika ada
                'phone' => '08123456789'
            ],
            'callbacks' => [
                'finish' => base_url('/')
            ]
            // 'notification_url' => base_url('checkout/callback'),
        ];

        $apiKey = env('MIDTRANS_API_KEY_CLIENT');

        $snapToken = Snap::getSnapToken($params);

        return view('checkout_midtrans', [
            'snapToken' => $snapToken,
            'dataOrder' => $data,
            'apiKey' => $apiKey
        ]);
    }

    public function success()
    {
        return view('checkout_success');
    }

    // tidak berfungsi

    // public function callback()
    // {
    //     MidtransConfig::config();

    //     $json_result = file_get_contents('php://input');
    //     $result = json_decode($json_result);

    //     // dd($result);

    //     // ⬇️ Tambahkan log untuk debug
    //     log_message('error', 'Callback Raw Input: ' . $json_result);
    //     // log_message('error', 'Tes log manual dari callback');
    //     log_message('error', 'Callback Midtrans (decoded): ' . json_encode($result));

    //     if (isset($result->transaction_status) && $result->transaction_status == 'settlement') {
    //         $noResi = $result->order_id;

    //         $orderModel = new \App\Models\OrderModel();
    //         $statusModel = new \App\Models\OrderStatusModel();

    //         $order = $orderModel->where('no_resi', $noResi)->first();

    //         if ($order) {
    //             $orderModel->update($order['id'], ['paid' => 1]);

    //             $statusModel->insert([
    //                 'order_id' => $order['id'],
    //                 'status' => 'Diproses'
    //             ]);
    //         }
    //     }

    //     return $this->response->setStatusCode(200);
    // }
}
