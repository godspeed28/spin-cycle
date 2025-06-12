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
    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name'     => 'required|min_length[3]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ];

            if (!$this->validate($rules)) {
                return view('auth/register', [
                    'validation' => $this->validator
                ]);
            }

            $userModel = new UserModel();
            $userModel->save([
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);

            return redirect()->to('/auth/register')->with('success', 'Registrasi berhasil!');
        }
    }
}
