<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\OrderModel;
use App\Models\OrderStatusModel;
use App\Models\OrderItemsModel;

class OrderController extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');

        // if (!$userId) {
        //     return redirect()->to('/Login');
        // }

        $orderModel = new OrderModel();
        $statusModel = new OrderStatusModel();
        $orderItemModel = new OrderItemsModel();

        // Ambil semua pesanan milik user
        $orders = $orderModel->where('user_id', $userId)->findAll();

        // Ambil status untuk semua pesanan user
        $orderStatuses = [];

        foreach ($orders as $order) {
            $statusLogs = $statusModel
                ->where('order_id', $order['id'])
                ->orderBy('updated_at', 'ASC')
                ->findAll();

            $orderStatuses[$order['id']] = $statusLogs;
        }


        $data = [
            'title' => 'Orders | Spin Cycle',
            'tel' => '+62 812-3626-2924',
            'phone' => '6281236262924',
            'icon' => 'list-alt',
            'orders' => $orders,
            'orderItem' => $orderItemModel->getItemsByUserId($userId),
            'orderStatuses' => $orderStatuses,
            'count' => model('OrderModel')->where('user_id', $userId)->countAllResults()
        ];

        return view('order', $data);
    }
}
