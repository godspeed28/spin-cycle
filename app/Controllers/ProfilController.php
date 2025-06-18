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
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Ambil data input
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'no_telp'  => $this->request->getPost('no_telp')
        ];

        // Cek dan hash password jika diisi
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Logika Upload Foto
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Buat nama file unik
            $newName = $foto->getRandomName();

            // Pindahkan ke folder upload
            $foto->move(ROOTPATH . 'public/uploads/foto/', $newName);

            // Hapus foto lama jika ada
            $user = $this->userModel->find($userId);
            if ($user && !empty($user['foto']) && file_exists(ROOTPATH . 'public/uploads/foto/' . $user['foto'])) {
                unlink(ROOTPATH . 'public/uploads/foto/' . $user['foto']);
            }

            // Simpan nama file ke data
            $data['foto'] = $newName;
        }

        // Update data user
        $this->userModel->update($userId, $data);

        return redirect()->to('/profil/detail')->with('success', 'Profil berhasil diperbarui.');
    }
}
