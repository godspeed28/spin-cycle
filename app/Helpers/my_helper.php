<?php

use App\Models\OrderModel;
use App\Models\UserModel;

function ubahRp($nilai)
{

    return 'Rp' . number_format($nilai ?? 0, 0, ',', '.');
}

function remove_underscore(string $text, string $replaceWith = ' '): string
{
    return str_replace('_', $replaceWith, $text);
}

function maskEmail($email)
{
    $parts = explode("@", $email);
    $name = $parts[0];
    $domain = $parts[1];

    // Ambil 2 huruf pertama, sisanya diganti bintang
    $maskedName = substr($name, 0, 2) . str_repeat("*", max(0, strlen($name) - 2));

    return $maskedName . "@" . $domain;
}

function maskPhone($phone)
{
    $len = strlen($phone);
    if ($len <= 2) {
        return $phone; // terlalu pendek, tampilkan saja
    }
    return str_repeat("*", $len - 2) . substr($phone, -2);
}


function getPendapatanHariIni()
{
    $orderModel = new OrderModel();

    $pendapatan = $orderModel
        ->selectSum('total_harga', 'pendapatan')
        ->where('DATE(created_at)', date('Y-m-d'))
        ->where('paid', 1)
        ->first();

    return ubahRp($pendapatan['pendapatan']);
}

function getPersenPendapatanHariIni($target = 1000000)
{
    $orderModel = new OrderModel();

    $pendapatan = $orderModel
        ->selectSum('total_harga', 'pendapatan')
        ->where('DATE(created_at)', date('Y-m-d'))
        ->where('paid', 1)
        ->first();

    $total = (int) ($pendapatan['pendapatan'] ?? 0); // antisipasi null
    $persen = $target > 0 ? ($total / $target) * 100 : 0;

    return max(0, min(100, round($persen))); // batasi dari 0–100
}

function getPendapatan()
{
    $orderModel = new OrderModel();

    $pendapatan = $orderModel
        ->selectSum('total_harga', 'pendapatan')
        ->where('paid', 1)
        ->first();

    return ubahRp($pendapatan['pendapatan']);
}

function getPersenPendapatan($target = 1000000)
{
    $orderModel = new OrderModel();

    $pendapatan = $orderModel
        ->selectSum('total_harga', 'pendapatan')
        ->where('paid', 1)
        ->first();

    $total = (int) ($pendapatan['pendapatan'] ?? 0); // antisipasi null
    $persen = $target > 0 ? ($total / $target) * 100 : 0;

    return max(0, min(100, round($persen))); // batasi dari 0–100
}

function getFreshOrdersHariIni()
{
    $orderModel = new OrderModel();

    return $orderModel
        ->where('status', 'Menunggu konfirmasi') // anggap fresh order = belum dibayar
        ->countAllResults();
}

function getPersenFreshOrdersHariIni($target = 1000000)
{
    $orderModel = new OrderModel();
    $pendapatan = $orderModel
        ->selectSum('total_harga', 'pendapatan')
        ->where('status', 'Menunggu konfirmasi')
        ->first();

    $total = (int) ($pendapatan['pendapatan'] ?? 0); // antisipasi null
    $persen = $target > 0 ? ($total / $target) * 100 : 0;
    return max(0, min(100, round($persen))); // nilai 0–100
}

function getNewUsersToday()
{
    $userModel = new UserModel();

    return $userModel
        ->where('DATE(created_at)', date('Y-m-d'))
        ->countAllResults(); // ✅ hitung jumlah user hari ini
}

function getPersenNewUsersToday($target = 50)
{
    $jumlah = getNewUsersToday();
    $persen = $target > 0 ? ($jumlah / $target) * 100 : 0;

    return max(0, min(100, round($persen))); // hasil 0–100
}

function getEnumValues(string $table, string $column): array
{
    $db = \Config\Database::connect();
    $query = $db->query("SHOW COLUMNS FROM `$table` WHERE Field = '$column'");
    $row = $query->getRow();

    if (!$row || !isset($row->Type)) {
        return [];
    }

    if (preg_match("/^enum\((.*)\)$/", $row->Type, $matches)) {
        $enumStr = $matches[1]; // isi: 'Diproses','Dalam Perjalanan',...
        $enumStr = str_replace("'", "", $enumStr); // hilangkan tanda petik
        $enumArr = explode(",", $enumStr); // pisah berdasarkan koma
        return array_map('trim', $enumArr); // hilangkan spasi berlebih
    }

    return [];
}

function ubahTanggalWaktu($tanggal, $waktu)
{
    return date('d M Y, H:i', strtotime($tanggal . ' ' . $waktu));
}

function getOnlineUsers()
{
    $userModel = new \App\Models\UserModel();

    return $userModel
        ->where('last_activity >=', date('Y-m-d H:i:s', strtotime('-5 minutes')))
        ->where('role', 'customer')
        ->countAllResults();
}

function getPersenOnlineUsers()
{
    $userModel = new UserModel();

    $current = getOnlineUsers();
    $target = count($userModel->where('role', 'customer')->findAll());
    $persen = $target > 0 ? ($current / $target) * 100 : 0;

    return round($persen, 2);
}

function getUsername()
{
    $userModel = new UserModel();
    $user = $userModel->select('username')
        ->where('id', session()->get('user_id'))
        ->first();
    return $user ? $user['username'] : null;
}

function getEmail()
{
    $userModel = new UserModel();
    $user = $userModel->select('email')
        ->where('id', session()->get('user_id'))
        ->first();
    return $user ? $user['email'] : null;
}

function getTelepon()
{
    $userModel = new UserModel();
    $user = $userModel->select('no_telp')
        ->where('id', session()->get('user_id'))
        ->first();
    return $user ? $user['no_telp'] : null;
}

function getFoto()
{
    $userModel = new UserModel();
    $user = $userModel->select('foto')
        ->where('id', session()->get('user_id'))
        ->first();
    return $user ? $user['foto'] : null;
}
