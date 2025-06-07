<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Wash extends BaseController
{
    public function index()
    {
        // // Cek apakah sudah login
        // if (!session()->get('logged_in')) {
        //     return redirect()->to('/Login/')->with('error', 'Silakan login terlebih dahulu.');
        // }

        $data = [
            'phone' => '6281236262924',
            'tel' => '+62 812-3626-2924',
            'title' => 'Order | SpinCycle',
            'title2' => 'Order',
            'icon' => 'basket-fill',
            'pakaian' => [
                ['nama' => 'Kaos', 'berat' => 0.2, 'icon' => 'tshirt'],
                ['nama' => 'Kemeja', 'berat' => 0.3, 'icon' => 'shirt'],
                ['nama' => 'Celana Jeans', 'berat' => 0.6, 'icon' => 'slash-square'],
                ['nama' => 'Celana Biasa', 'berat' => 0.4, 'icon' => 'bounding-box-circles'],
                ['nama' => 'Jaket Tipis', 'berat' => 0.6, 'icon' => 'cloud-lightning'],
                ['nama' => 'Jaket Tebal', 'berat' => 1.0, 'icon' => 'clouds'],
                ['nama' => 'Handuk Kecil', 'berat' => 0.4, 'icon' => 'file-earmark-ruled'],
                ['nama' => 'Handuk Besar', 'berat' => 0.8, 'icon' => 'file-earmark-richtext'],
                ['nama' => 'Sprei Single', 'berat' => 0.7, 'icon' => 'grid-1x2-fill'],
                ['nama' => 'Sprei King', 'berat' => 1.2, 'icon' => 'grid-3x3-gap-fill'],
                ['nama' => 'Selimut Tipis', 'berat' => 1.0, 'icon' => 'journals'],
                ['nama' => 'Selimut Tebal', 'berat' => 2.0, 'icon' => 'journal-check'],
                ['nama' => 'Gorden Tipis', 'berat' => 0.8, 'icon' => 'arrows-expand'],
                ['nama' => 'Gorden Tebal', 'berat' => 1.5, 'icon' => 'arrows-collapse'],
                ['nama' => 'Baju Anak-anak', 'berat' => 0.1, 'icon' => 'emoji-smile-fill'],
            ]
        ];
        return view('wash', $data);
    }
    public function checkout()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/Wash/')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request = service('request');
        // dd($request);

        $harga_per_kg = [
            'Cuci Kering' => 5000,
            'Cuci Setrika' => 7000,
            'Setrika Saja' => 4000,
        ];


        // Ambil data dari database (atau hardcode jika perlu)
        $pakaian = [
            'Kaos',
            'Kemeja',
            'Celana_Jeans',
            'Celana_Biasa',
            'Jaket_Tipis',
            'Jaket_Tebal',
            'Handuk_Kecil',
            'Handuk_Besar',
            'Sprei_Single',
            'Sprei_King',
            'Selimut_Tipis',
            'Selimut_Tebal',
            'Gorden_Tipis',
            'Gorden_Tebal',
            'Baju_Anak-anak'
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

        $berat_dibulatkan = ceil($total_berat);

        // Cek harga per kg berdasarkan jenis layanan, kalau tidak ada default 0
        $total_harga = isset($harga_per_kg[$jenis_layanan]) ? $harga_per_kg[$jenis_layanan] * $berat_dibulatkan : 0;

        $berat_per_item = [
            'Kaos' => 0.2,
            'Kemeja' => 0.3,
            'Celana_Jeans' => 0.6,
            'Celana_Biasa' => 0.4,
            'Jaket_Tipis' => 0.6,
            'Jaket_Tebal' => 1.0,
            'Handuk_Kecil' => 0.4,
            'Handuk_Besar' => 0.8,
            'Sprei_Single' => 0.7,
            'Sprei_King' => 1.2,
            'Selimut_Tipis' => 1.0,
            'Selimut_Tebal' => 2.0,
            'Gorden_Tipis' => 0.8,
            'Gorden_Tebal' => 1.5,
            'Baju_Anak-anak' => 0.1
        ];


        $data = [
            'nama' => $request->getPost('nama'),
            'jenis_layanan' => $request->getPost('jenis_layanan'),
            'berat' => $request->getPost('berat'),
            'alamat' => $request->getPost('alamat'),
            'catatan' => $request->getPost('catatan'),
            'tanggal' => $request->getPost('tanggal'),
            'waktu' => $request->getPost('waktu'),
            'jenis_pakaian' => json_encode($jenisPakaianTerpilih),
            'jasa_express' => $request->getPost('expressService'),
            'title' => 'Checkout | SpinCycle',
            'title2' => 'Checkout',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'icon' => 'basket-fill',
            'total_harga' => $total_harga
        ];

        return view('checkout', $data);
    }
}
