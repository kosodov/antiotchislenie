<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Dish;

class MenuController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        $cartItems = CartItem::all()->groupBy('dish_id')->map->sum('quantity');
        return view('menu.index', compact('dishes', 'cartItems'));
    }


    public function addToCart(Request $request, Dish $dish)
    {
        // Получаем все элементы корзины пользователя
        $cartItems = CartItem::all();

        // Проверяем каждый элемент корзины на совпадение с добавляемым блюдом
        $existingCartItem = $cartItems->where('dish_id', $dish->id)->first();

        if ($existingCartItem) {
            // Если блюдо уже есть в корзине, увеличиваем его количество на 1
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            // Если блюда нет в корзине, создаем новую запись
            CartItem::create([
                'dish_id' => $dish->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Блюдо добавлено в корзину');
    }


    public function removeFromCart(Request $request, Dish $dish)
    {
        // Находим запись о блюде в корзине и удаляем ее
        CartItem::where('dish_id', $dish->id)->delete();

        return redirect()->back()->with('success', 'Блюдо удалено из корзины');
    }

    public function updateDeliveryAddress(Request $request)
    {
        // Получаем адрес доставки из запроса
        $address = $request->input('delivery_address');

        // Сохраняем адрес доставки в сессии или базе данных пользователя

    return redirect()->back()->with('success', 'Адрес доставки обновлен');
    }   

    public function updateDeliveryTime(Request $request)
    {
        // Получаем время доставки из запроса
        $time = $request->input('delivery_time');

        // Сохраняем время доставки в сессии или базе данных пользователя

        return redirect()->back()->with('success', 'Время доставки обновлено');
    }

}
