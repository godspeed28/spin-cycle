<?php

namespace App\Controllers;

class ReportController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        $data = [
            'title' => 'Report',
        ];
        return view('admin/report', $data);
    }
}
