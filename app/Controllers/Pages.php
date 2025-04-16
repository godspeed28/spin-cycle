<?php

namespace App\Controllers;

use App\Models\UserModel;


class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Spin Cycle',
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About | Spin Cycle',
            'contact' => [
                'tel' => '6281236262924',
                'tl' => '+62 812-3626-2924',
                'alamat' => 'abekolin@outlook.com'
            ],
            'test' => ['Alfa', 'Emen', 'Abe']
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact | Spin Cycle',
            'contact' => [
                'tel' => '6281236262924',
                'tl' => '+62 812-3626-2924',
                'alamat' => 'abekolin@outlook.com'
            ]
        ];
        return view('pages/contact', $data);
    }
    public function services()
    {
        $data = [
            'title' => 'Services | Spin Cycle'
        ];
        return view('pages/services', $data);
    }
}
