<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

use App\Models\PakaianModel;
use App\Models\LayananModel;

class Wash extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        $pakaianModel = new PakaianModel();
        $dataPakaianModel = $pakaianModel->findAll();

        $layananModel = new LayananModel();
        $datalayananModel = $layananModel->findAll();

        $data = [
            'phone' => '6281236262924',
            'tel' => '+62 812-3626-2924',
            'title' => 'Order | SpinCycle',
            'title2' => 'Order',
            'icon' => 'basket-fill',
            'validation' => session()->get('validation'),
            'pakaian' => $dataPakaianModel,
            'jenis_layanan' => $datalayananModel,
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];
        return view('wash', $data);
    }
    public function checkout()
    {
        $userId = session()->get('user_id');
        $pakaianModel = new PakaianModel();
        $dataPakaianModel = $pakaianModel->findAll();

        // Ubah jadi array asosiatif
        $pakaian = [];
        foreach ($dataPakaianModel as $row) {
            $pakaian[] = str_replace(' ', '_', $row['nama']);
        }

        $layananModel = new LayananModel();
        $datalayananModel = $layananModel->findAll();

        // Ubah jadi array asosiatif
        $harga_per_kg = [];
        foreach ($datalayananModel as $row) {
            $harga_per_kg[$row['nama']] = (int)$row['harga_per_kg'];
        }

        if (!session()->get('logged_in')) {
            return redirect()->to('/Wash/')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (
            !$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'jenis_layanan' => [
                    'label' => 'jenis layanan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'berat' => [
                    'rules' => 'required|greater_than_equal_to[1]',
                    'errors' => [
                        'greater_than_equal_to' => '{field} tidak boleh kurang dari 1 Kg.'
                    ]
                ]

            ])
        ) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Wash')->withInput()->with('validation', $validation);
        }

        $request = service('request');

        $jasa_express = $this->request->getPost('expressService') ?? 0;
        $jasa_express = is_numeric($jasa_express) ? (int) $jasa_express : 0;

        $pakaianIcon = [
            'Kaos' => '👕',
            'Kemeja' => '👔',
            'Celana_Jeans' => '👖',
            'Celana_Biasa' => '🩳',
            'Jaket_Tipis' => '🧥',
            'Jaket_Tebal' => '🧥❄️',
            'Handuk_Kecil' => '🧻',
            'Handuk_Besar' => '🛁',
            'Sprei_Single' => '🛏️',
            'Sprei_King' => '🛌',
            'Selimut_Tipis' => '🧣',
            'Selimut_Tebal' => '🛌🧤',
            'Gorden_Tipis' => '🪟',
            'Gorden_Tebal' => '🪟🧵',
            'Baju_Anak-anak' => '🧒👕'
        ];

        // Tangkap hanya pakaian yang jumlahnya > 0
        $jenisPakaianTerpilih = [];

        foreach ($pakaian as $item) {
            $jumlah = (int) $request->getPost($item);
            if ($jumlah > 0) {
                $jenisPakaianTerpilih[$item] = $jumlah;
            }
        }

        $jenis_layanan = $request->getPost('jenis_layanan');

        // Hitung total berat pakaian terpilih
        $total_berat = $request->getPost('berat');
        foreach ($jenisPakaianTerpilih as $item => $jumlah) {
            if (isset($berat_per_item[$item])) {
                $total_berat += $berat_per_item[$item] * $jumlah;
            }
        }

        // Cek harga per kg berdasarkan jenis layanan, kalau tidak ada default 0
        $total_harga = isset($harga_per_kg[$jenis_layanan]) ? $harga_per_kg[$jenis_layanan] * $total_berat : 0;

        $berat_per_item = [];
        foreach ($dataPakaianModel as $row) {
            $key = str_replace(' ', '_', $row['nama']);
            $berat_per_item[$key] = (float) $row['berat'];
        }


        $data = [
            'nama' => $request->getPost('nama'),
            'jenis_layanan' => $request->getPost('jenis_layanan'),
            'harga_jenis_layanan' => $harga_per_kg,
            'berat_satuan' => $berat_per_item,
            'berat' => $request->getPost('berat'),
            'alamat' => $request->getPost('alamat'),
            'catatan' => $request->getPost('catatan'),
            'tanggal' => $request->getPost('tanggal'),
            'waktu' => $request->getPost('waktu'),
            'jenis_pakaian' => json_encode($jenisPakaianTerpilih),
            'jasa_express' => $jasa_express,
            'title' => 'Checkout | SpinCycle',
            'title2' => 'Checkout',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'iconPakaian' => $pakaianIcon,
            'total_harga' => $total_harga,
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()

        ];

        return view('checkout', $data);
    }
    public function showCheckout()
    {
        return view('checkout');
    }
}
