<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function takeOrder(Order $order)
    {
        $order->status = 'В работе';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Заказ принят в работу');
    }
}
