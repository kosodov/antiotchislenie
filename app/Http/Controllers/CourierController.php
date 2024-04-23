<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CourierController extends Controller
{
    public function index()
    {
        // Получаем список заказов, доступных для доставки
        $orders = Order::where('status', 'на кухне')->get();
        return view('courier.index', compact('orders'));
    }

    public function takeOrder(Order $order)
    {
        // Устанавливаем статус заказа как "ожидает курьера"
        $order->status = 'ожидает курьера';
        $order->save();
        return redirect()->back()->with('success', 'Заказ взят на доставку');
    }

    public function confirmDelivery(Order $order)
    {
        // Устанавливаем статус заказа как "доставлен"
        $order->status = 'доставлен';
        $order->save();
        return redirect()->back()->with('success', 'Заказ успешно доставлен');
    }

    public function reportProblem(Request $request, Order $order)
    {
        // Отправляем отчет о проблеме с заказом менеджеру
        $problemDescription = $request->input('problem_description');
        // Здесь может быть логика отправки уведомления или записи в базу данных
        return redirect()->back()->with('success', 'Отчет о проблеме отправлен менеджеру');
    }
}
