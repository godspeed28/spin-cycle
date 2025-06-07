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
}
