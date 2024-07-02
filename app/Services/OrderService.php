<?php

namespace App\Services;

use App\Constants\OrderStatus;
use App\Models\Order;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Auth;

class OrderService {
    public function getById($id) {
        return Order::where('id', $id)->first();
    }

    public function getUserOrders() {
        $ids = UserOrder::where('user_id', Auth::id())->get('id');
        return Order::whereIn('id', $ids)->get();
    }

    public function getAll() {
        return Order::all();
    }

    public function create($comment) {
        $order = new Order([
            "number" => "N",
            "status" => OrderStatus::$CREATED,
            "warranty_case" => OrderStatus::$WARRANTY_CASE_DEFAULT,
            "comment" => $comment,
            "resolution" => OrderStatus::$RESOLUTION_DEFAULT
        ]);

        $order->save();

        $order->number = "N" . $order->id;

        $order->save();

        $userOrder = new UserOrder([
            "user_id" => Auth::id(),
            "order_id" => $order->id,
        ]);

        $userOrder->save();
    }

    public function edit($id, $status, $warranty_case, $resolution) {
        $order = $this->getById($id);

        if ($order) {
            $order->status = $status;
            $order->warranty_case = $warranty_case;
            $order->resolution = $resolution;

            $order->save();
        }
    }
}
