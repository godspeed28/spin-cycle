<?php

namespace App\Controllers;

use App\Models\UserModel;

class UsersController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $result = $this->userModel->findAll();

        $data = [
            'title' => 'Users',
            'users' => $result
        ];
        return view('admin/users', $data);
    }

    // insert users
    public function save()
    {
        if (!$this->validate([
            'username' => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'no_telp'  => 'required|numeric|min_length[10]',
            'role'     => 'required|in_list[admin,customer]' // sesuaikan dengan peran yang tersedia
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email'    => $this->request->getPost('email'),
            'no_telp'  => $this->request->getPost('no_telp'),
            'role'     => $this->request->getPost('role')
        ]);

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan!');
    }

    // update users
    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'role' => $this->request->getPost('role')
        ];
        $this->userModel->update($id, $data);
        return redirect()->to('/users')->with('success', 'User berhasil diperbarui.');
    }

    // delete users
    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/users')->with('success', 'User berhasil dihapus.');
    }
}
