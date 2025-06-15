<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class EmailController extends Controller
{
    public function kirim()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/Login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $email = \Config\Services::email();

        $nama = $this->request->getPost('nama');
        $fromEmail = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $pesan = $this->request->getPost('message');

        $email->setTo('albertog4taz28@gmail.com'); // Ganti dengan email tujuan
        $email->setFrom($fromEmail, $nama);
        $email->setSubject('Pesan dari Form Kontak');
        $email->setMessage("
    <div style='font-family: Arial, sans-serif; max-width:600px; overflow:hidden'>
        <div style='background-color:white; color:white; text-align: left;'>
            <h2 style='color: #0dcaf0'>Spin<span style='color:black'> Cycle</span></h2>
        </div>
        <div style='padding:10px; border-top:1px solid black;'>
            <p><strong style='color:#17a2b8;'>Nama:</strong> $nama</p>
            <p><strong style='color:#17a2b8;'>Email:</strong> $fromEmail</p>
            <p><strong style='color:#17a2b8;'>Phone:</strong> $phone</p>
            <hr style='border-top:1px solid #17a2b8'>
            <p><strong style='color:#17a2b8;'>Pesan:</strong></p>
            <div style='background-color:#e9f7fd; padding:15px; border:1px solid #bce8f1; color:#31708f;'>
                $pesan
            </div>
        </div>
        <div style='text-align:center; padding:10px; font-size:12px; color:#31708f'>
            Spin Cycle Laundry System | Ini adalah email otomatis, mohon tidak dibalas.
        </div>
    </div>
");
        if ($email->send()) {
            return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengirim pesan.');
        }
    }
}
