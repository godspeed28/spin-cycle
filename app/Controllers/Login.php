<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login | SpinCycle',
            'title2' => 'Log in',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924'
        ];
        return view('login', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $nue = $this->request->getPost('nohp/username/email');
        $password = $this->request->getPost('password');

        // Cek berdasarkan username ATAU no_telp ATAU email
        $data = $model
            ->where('username', $nue)
            ->orWhere('no_telp', $nue)
            ->orWhere('email', $nue)
            ->first();

        if ($data) {
            if ($data['role'] == 'admin') {
                $pass = $data['password'];
                if (password_verify($password, $pass)) {
                    $session->set([
                        'user_id' => $data['id'],
                        'no_telp' => $data['no_telp'],
                        'username' => $data['username'],
                        'role' => $data['role'],
                        'logged_in_admin' => true
                    ]);
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->back()->with('error', 'Password salah');
                }
            }
            $pass = $data['password'];
            if (password_verify($password, $pass)) {
                $session->set([
                    'user_id' => $data['id'],
                    'no_telp' => $data['no_telp'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'logged_in' => true
                ]);
                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Login gagal. Cek kembali data Anda');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
