<?php

namespace App\Controllers;

class Wash extends BaseController
{
    public function index()
    {
        // Cek apakah sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/Login/')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
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
        // Cek apakah sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/Login/')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
            'title' => 'Checkout | SpinCycle',
            'title2' => 'Checkout',
            'icon' => 'basket-fill'
        ];
        return view('checkout', $data);
    }
}
