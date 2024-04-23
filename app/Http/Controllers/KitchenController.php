<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class KitchenController extends Controller
{
    public function index()
    {
        // Получаем список заказов, находящихся на кухне
        $orders = Order::where('status', 'на кухне')->get();
        return view('kitchen.index', compact('orders'));
    }

    public function startPreparation(Order $order)
    {
        // Устанавливаем статус заказа на "ожидает курьера"
        $order->status = 'ожидает курьера';
        $order->save();
        return redirect()->back()->with('success', 'Начало приготовления заказа подтверждено');
    }
}
