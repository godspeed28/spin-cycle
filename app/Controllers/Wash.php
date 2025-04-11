<?php

namespace App\Controllers;

class Wash extends BaseController
{
    public function index()
    {
        // Cek apakah sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/Login/')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('wash');
    }
}
