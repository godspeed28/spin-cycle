<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\OrderItemsModel;

class ProfilCustomerController extends BaseController
{
    protected $userModel;
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemsModel();
    }
    public function index()
    {
        if (session()->get('logged_in_admin') || !session()->get('logged_in')) {
            return redirect()->back();
        }
        helper('my');
        $userId = session()->get('user_id');
        $user = $this->userModel->where('role', 'customer')->find($userId);
        $orders = $this->orderModel->where('user_id', $userId)->findAll();
        $noHp = $this->userModel->select('no_telp')->find($userId);

        $data = [
            'title' => 'Profil | Spin Cycle',

            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('status !=', 'selesai')->where('user_id', $userId)->countAllResults(),
            'user' => $user,
            'orders' => $orders,
            'ordersProses' => $this->orderModel->whereIn('status', ['Menunggu konfirmasi', 'Menunggu penjemputan', 'Sedang dicuci'])->where('user_id', $userId)->findAll(),
            'ordersKirim' => $this->orderModel->whereIn('status', ['Siap diantar', 'Dalam pengantaran'])->where('user_id', $userId)->findAll(),
            'ordersUnpaid' => $this->orderModel->where('paid', 0)->where('user_id', $userId)->findAll(),
            'ordersSelesai' => $this->orderModel->where('status', 'selesai')->where('user_id', $userId)->findAll(),
            'ordersBatal' => $this->orderModel->where('status', 'Dibatalkan')->where('user_id', $userId)->findAll(),
            'orderItem' => $this->orderItemModel->getItemsByUserId($userId),
            'noHp' => $noHp
        ];
        return view('profil-customer', $data);
    }
    public function verify()
    {
        return view('verify');
    }
    public function check()
    {
        $password = $this->request->getPost('verify_pass');

        $userId = session()->get('user_id');
        $user = $this->userModel->where('role', 'customer')->find($userId);

        $passwordBenar = $user['password'];
        if (password_verify($password, $passwordBenar)) {
            return redirect()->to('profil-customer')->with('redirect_source', 'verifikasiSukses');
        } else {
            return redirect()->back()->withInput()->with('error', 'Password yang Anda masukkan salah.');
        }
    }
    public function changePass()
    {
        $password = $this->request->getPost('password');
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new UserModel();
        $userModel->update($userId, [
            'password' => $hashedPassword
        ]);

        return redirect()->to('profil-customer')->with('success', 'Password berhasil diubah.');
    }
    public function update()
    {
        $userId = session('user_id');

        $validationRules = [
            'username' => "required|is_unique[users.username,id,{$userId}]",
            'email'    => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'no_telp'  => "required|numeric|is_unique[users.no_telp,id,{$userId}]"
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'no_telp'  => $this->request->getPost('no_telp'),
            'alamat'   => $this->request->getPost('alamat'),
        ];

        $this->userModel->update($userId, $data);

        return redirect()->to('profil-customer')->with('success', 'Profil berhasil diperbarui.');
    }
}
