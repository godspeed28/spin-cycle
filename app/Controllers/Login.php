<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $session = session();

        // Jika sudah login, redirect ke halaman sebelumnya
        if ($session->get('logged_in') || $session->get('logged_in_admin')) {
            return redirect()->back();
        }

        // ✅ Auto-login jika cookie ada
        if (isset($_COOKIE['remember_login'])) {
            $userId = $_COOKIE['remember_login'];
            $model = new UserModel();
            $user = $model->find($userId);

            if ($user) {
                $session->set([
                    'user_id'   => $user['id'],
                    'no_telp'   => $user['no_telp'],
                    'email'     => $user['email'],
                    'username'  => $user['username'],
                    'role'      => $user['role'],
                    $user['role'] === 'admin' ? 'logged_in_admin' : 'logged_in' => true
                ]);
                return redirect()->to($user['role'] === 'admin' ? '/dashboard' : '/');
            }
        }

        $data = [
            'title'  => 'Login | SpinCycle',
            'title2' => 'Log in',
            'tel'    => '+62 812-3626-2924',
            'phone'  => '6281236262924'
        ];
        return view('login', $data);
    }

    public function auth()
    {
        $session  = session();
        $model    = new UserModel();
        $nue      = $this->request->getPost('nohp/username/email');
        $password = $this->request->getPost('password');

        // Cek berdasarkan username / no_telp / email
        $data = $model
            ->where('username', $nue)
            ->orWhere('no_telp', $nue)
            ->orWhere('email', $nue)
            ->first();

        if ($data) {
            $pass = $data['password'];
            if (password_verify($password, $pass)) {
                // ✅ Set session login
                $session->set([
                    'user_id'   => $data['id'],
                    'no_telp'   => $data['no_telp'],
                    'email'     => $data['email'],
                    'username'  => $data['username'],
                    'role'      => $data['role'],
                    $data['role'] === 'admin' ? 'logged_in_admin' : 'logged_in' => true
                ]);

                // ✅ Set cookie jika centang "Ingat saya" (berlaku 5 menit)
                if ($this->request->getPost('remember')) {
                    setcookie('remember_login', $data['id'], time() + (60 * 5), "/");
                }

                return redirect()->to($data['role'] === 'admin' ? '/dashboard' : '/');
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

        // ✅ Hapus cookie
        setcookie("remember_login", "", time() - 3600, "/");

        return redirect()->to('/');
    }

    public function logoutAdmin()
    {
        session()->destroy();

        // ✅ Hapus cookie
        setcookie("remember_login", "", time() - 3600, "/");

        return redirect()->to('/Login');
    }
}
