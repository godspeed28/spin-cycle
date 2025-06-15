<?php

namespace App\Controllers;

use App\Models\UserModel;

class Daftar extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar | SpinCycle',
            'title2' => 'Daftar',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924'
        ];
        return view('daftar', $data);
    }
    public function auth()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $no_telp = $this->request->getPost('no_telp');
        $password = $this->request->getPost('password');
        // $password_confirm = $this->request->getPost('password_confirm');

        // Validasi sederhana
        if (empty($username) || empty($email) || empty($no_telp) || empty($password)) {
            return redirect()->back()->with('error', 'Semua field wajib diisi.');
        }

        // Cek apakah username, email, atau no_telp sudah digunakan
        $existing = $model
            ->groupStart()
            ->where('username', $username)
            ->orWhere('email', $email)
            ->orWhere('no_telp', $no_telp)
            ->groupEnd()
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Username, email, atau no. telp sudah digunakan.');
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $model->save([
            'username' => $username,
            'email' => $email,
            'no_telp' => $no_telp,
            'password' => $hashedPassword
        ]);

        return redirect()->to('/Login')->with('success', 'Pendaftaran berhasil!');
    }
}
