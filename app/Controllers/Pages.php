<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | PWL',
            'status' => 'active',

        ];
        return view('pages/home', $data);

    }
    public function about()
    {
        $data = [
            'title' => 'About | PWL',
            'status' => 'active',
            'test' => ['Alfa', 'Emen', 'Abe']
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact | PWL',
            'status' => 'active',
            'contact' => [
                'tel' => '081246881584',
                'alamat' => 'abekolin@outlook.com'
            ]
        ];
        return view('pages/contact', $data);
    }
}
