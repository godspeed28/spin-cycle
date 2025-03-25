<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Spin Cycle'
        ];
        return view('pages/home', $data);

    }
    public function about()
    {
        $data = [
            'title' => 'About | Spin Cycle',
            'test' => ['Alfa', 'Emen', 'Abe']
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact | Spin Cycle',
            'contact' => [
                'tel' => '081246881584',
                'alamat' => 'abekolin@outlook.com'
            ]
        ];
        return view('pages/contact', $data);
    }
}
