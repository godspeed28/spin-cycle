<?php

namespace App\Controllers;

use App\Models\UserModel;


class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Spin Cycle',
            'tel' => '+62 812-3626-2924'
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'test' => ['Alfa', 'Emen', 'Abe']
        ];
        return view('pages/about', $data);
    }
    public function services()
    {
        $data = [
            'title' => 'Services | Spin Cycle',
            'tel' => '+62 812-3626-2924'
        ];
        return view('pages/services', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact | Spin Cycle',
            'tel' => '+62 812-3626-2924'
        ];
        return view('pages/contact', $data);
    }
}
