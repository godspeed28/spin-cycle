<?php

namespace App\Controllers;

class ReportController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Report',
        ];
        return view('admin/report', $data);
    }
}
