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
}
