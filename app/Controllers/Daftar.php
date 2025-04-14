<?php

namespace App\Controllers;

use App\Models\UserModel;

class Daftar extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar | SpinCycle',
            'title2' => 'Daftar'
        ];
        return view('daftar', $data);
    }
}
