<?php

namespace App\Controllers;

use App\Models\UserModel;

class ServicesItemController extends BaseController
{
    public function washfold()
    {
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Regular Wash & Fold | Spin Cycle',
            'item' => 'Regular Wash & Fold',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()

        ];
        return view('pages/washfold', $data);
    }

    public function expresslaundry()
    {
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Express Laundry | Spin Cycle',
            'item' => 'Express Laundry',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];
        return view('pages/expresslaundry', $data);
    }

    public function drycleaning()
    {
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Dry Cleaning | Spin Cycle',
            'item' => 'Dry Cleaning',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];
        return view('pages/drycleaning', $data);
    }


    public function ironingonly()
    {
        $userId = session()->get('user_id');
        $data = [
            'title' => 'Ironing Only | Spin Cycle',
            'item' => 'Ironing Only',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];
        return view('pages/ironingonly', $data);
    }
}
