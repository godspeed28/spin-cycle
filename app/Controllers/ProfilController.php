<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfilController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function detail()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        helper('my');

        $data = [
            'title' => 'Account Setting',
            'user' => $this->userModel->find(session()->get('user_id'))
        ];
        return view('admin/setting_profil', $data);
    }

    public function update()
    {
        // Ambil ID user dari session
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Data dasar
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'no_telp'  => $this->request->getPost('no_telp')
        ];

        // Jika password diisi, hash dan masukkan ke data
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Update data user
        $this->userModel->update($userId, $data);

        return redirect()->to('/profil/detail')->with('success', 'Profil berhasil diperbarui.');
    }
}
