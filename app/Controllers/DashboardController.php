<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LayananModel;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->back();
        }
        helper('my');
        $data = [
            'title' => 'Dashboard',
        ];
        return view('admin/dashboard', $data);
    }
}
