<?php

use App\Models\OrderModel;
use App\Models\UserModel;

function ubahRp($nilai)
{

    return 'Rp ' . number_format($nilai ?? 0, 0, ',', '.');
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

if (!function_exists('getFreshOrdersHariIni')) {
    function getFreshOrdersHariIni()
    {
        $orderModel = new OrderModel();

        return $orderModel
            ->where('DATE(created_at)', date('Y-m-d'))
            ->where('paid', 0) // anggap fresh order = belum dibayar
            ->countAllResults();
    }
}

if (!function_exists('getPersenFreshOrdersHariIni')) {
    function getPersenFreshOrdersHariIni($target = 30)
    {
        $jumlah = getFreshOrdersHariIni();
        $persen = $target > 0 ? ($jumlah / $target) * 100 : 0;

        return max(0, min(100, round($persen))); // nilai 0–100
    }
}


if (!function_exists('getNewUsersToday')) {
    function getNewUsersToday()
    {
        $userModel = new UserModel();

        return $userModel
            ->where('DATE(created_at)', date('Y-m-d'))
            ->countAllResults(); // ✅ hitung jumlah user hari ini
    }
}

if (!function_exists('getPersenNewUsersToday')) {
    function getPersenNewUsersToday($target = 50)
    {
        $jumlah = getNewUsersToday();
        $persen = $target > 0 ? ($jumlah / $target) * 100 : 0;

        return max(0, min(100, round($persen))); // hasil 0–100
    }
}
